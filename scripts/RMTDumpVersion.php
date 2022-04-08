<?php

use Liip\RMT\Action\BaseAction;
use Liip\RMT\Context;

class RMTDumpVersion extends BaseAction
{
    public function getTitle()
    {
        return 'Dump application version to file VERSION';
    }

    public function execute(): void
    {
        // Get the new tag
        $gitTag = Context::get('version-persister')->getTagFromVersion(Context::getInstance()->getParam('new-version'));

        // Update config file
        Context::get('output')->write(
            sprintf(PHP_EOL . 'New version [<yellow>%s</yellow>] updated into the VERSION file: ', $gitTag)
        );

        file_put_contents(__DIR__ . '/../VERSION', $gitTag);
        $this->confirmSuccess();
    }
}
