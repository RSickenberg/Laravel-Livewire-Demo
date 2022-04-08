<div>
    <div class="alert alert-info shadow-lg">
        <div>
            <i class="fa-solid fa-circle-info"></i>
            <span>Bonjour, je suis un composant Livewire!</span>
        </div>
    </div>
    <div class="mt-10">
        <div class="card bg-base-100 w-60 shadow-2xl inner-shadow m-auto">
            <div class="card-body">
                <div class="flex gap-6">
                    <div>
                        <span class="countdown font-mono text-9xl">
                            <span style="--value:{{ $loveCounter }}"></span>
                        </span>
                        <span class="font-bold text-2xl">
                            Love for Antistatique 💘
                        </span>
                    </div>
                </div>
                <div class="card-actions justify-end">
                    <button wire:click="showLove" class="btn btn-block btn-accent mt-5">Ajouter de l'amour</button>
                </div>
            </div>
        </div>
    </div>
</div>
