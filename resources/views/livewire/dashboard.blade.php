<div class="flex h-full w-full flex-1 flex-col gap-4 justify-center items-center">
    <form wire:submit="login" class="flex flex-col gap-6 2xl:w-2/6 xl:w-2/4 w-3/4">

        <flux:input wire:model="name" label="Nome" />
        <flux:input wire:model="email" label="E-mail" type="email" />
        <flux:input wire:model="phone" label="Número de WhatsApp" mask="(99) 99999-9999" />
        <flux:select wire:model="industry" label="Idioma de Origem">
            @foreach (\App\Enums\Language::values() as $item)
            <flux:select.option>{{$item}}</flux:select.option>
            @endforeach
        </flux:select>
        <flux:select wire:model="industry" label="Idioma de Destino" placeholder="Selecione um Idioma">
            @foreach (\App\Enums\Language::values() as $item)
            <flux:select.option>{{$item}}</flux:select.option>
            @endforeach
        </flux:select>
        <flux:input type="file" wire:model="file" label="Anexar Arquivo" />
        <div class="flex flex-row justify-between">
            <flux:button variant="primary" type="submit">{{ __('Enviar') }}</flux:button>
            <flux:button variant="danger" wire:click='reset'>{{ __('Cancelar') }}</flux:button>
        </div>
    </form>
</div>