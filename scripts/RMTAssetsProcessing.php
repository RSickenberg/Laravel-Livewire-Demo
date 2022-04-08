<?php

use Liip\RMT\Action\BaseAction;
use Liip\RMT\Context;
use Symfony\Component\Process\Exception\ProcessFailedException;

class RMTAssetsProcessing extends BaseAction
{
    public function getTitle()
    {
        return 'Build JS and CSS for production';
    }

    public function execute(): void
    {
        $firstRelease = $packageJsonModified = $assetsModified = false;

        // Check if it's the first branch release
        if (Context::get('information-collector')->hasRequest('confirm-first')) {
            Context::get('output')->writeln('First release of this branch, build is mandatory');
            $firstRelease = true;
        }

        if (!$firstRelease) {
            $modifications = Context::get('vcs')->getModifiedFilesSince(Context::get('version-persister')->getCurrentVersionTag());
            if (array_key_exists('package.json', $modifications)) {
                Context::get('output')->writeln('package.json modified, <yellow>npm install</yellow> required');
                $packageJsonModified = true;
            }
            foreach (array_keys($modifications) as $file) {
                if (strpos($file, 'assets') === 0) {
                    Context::get('output')
                        ->writeln('Modifications detected in the assets folder, <yellow>npm build</yellow> is required'
                        );
                    $assetsModified = true;
                    break;
                }
            }
        }

        $commands = [];
        if ($firstRelease || $packageJsonModified) {
            $commands[] = 'npm install';
        }
        if ($firstRelease || $assetsModified) {
            $commands[] = 'npm run build';
        }
        if (count($commands) > 0) {
            $commands = implode(' && ', $commands);
            $process = $this->executeCommandInProcess($commands, 600);

            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            Context::get('output')->writeln('<comment>Build done with success</comment>');
        } else {
            Context::get('output')->writeln('<yellow>no build needed</yellow>');
        }
    }
}
