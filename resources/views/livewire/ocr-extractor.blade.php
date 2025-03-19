<div class="flex flex-col gap-4">
    <flux:heading size="xl" level="1">Extração de Texto via OCR</flux:heading>
    <flux:separator variant="subtle" />

    <div class="flex flex-col items-center">
        <form wire:submit="save" class="flex flex-col py-8 gap-4  2xl:w-2/6 xl:w-2/4 w-3/4">
            <flux:input wire:model="form.name" :label="__('Nome Completo')" :placeholder="__('Digite seu nome completo')" />

            <flux:input wire:model="form.email" :label="__('E-mail')" type="email" :placeholder="__('Digite seu e-mail')" />

            <flux:input id="phone" wire:model="form.phone" wire:blur="$js.validatePhone" :label="__('Número de WhatsApp')" />

            <flux:select wire:model="form.sourceLanguage" :label="__('Idioma de Origem')" :placeholder="__('Selecione um Idioma')">
                @foreach (\App\Enums\Language::array() as $key => $item)
                    <flux:select.option value="{{$key}}">{{$item}}</flux:select.option>
                @endforeach
            </flux:select>

            <flux:select wire:model="form.targetLanguage" :label="__('Idioma de Destino')" :placeholder="__('Selecione um Idioma')">
                @foreach (\App\Enums\Language::array() as $key => $item)
                    <flux:select.option value="{{$key}}">{{$item}}</flux:select.option>
                @endforeach
            </flux:select>

            <div class="flex justify-between w-full items-center">
                <flux:input type="file" wire:model="form.file" :label="__('Anexar Arquivo')" :placeholder="__('Selecione um Arquivo')" />
                <div wire:loading wire:target="form.file">
                    <flux:icon.loading />
                </div>
            </div>

            <div class="flex flex-row justify-between">
                <flux:button variant="primary" type="submit">{{ __('Enviar') }}</flux:button>
                <flux:button wire:loading.attr="disabled" variant="danger" wire:click='cancel'>{{ __('Cancelar') }}
                </flux:button>
            </div>
        </form>

        <div class="flex flex-col gap-4 justify-start items-start 2xl:w-2/6 xl:w-2/4 w-3/4">
            <div class="flex flex-row font-medium space-x-3">
                <p>Quantidade de palavras: <span wire:loading.remove wire:target="save" wire:text="numbersWords"></span>
                </p>
                <flux:icon.loading wire:loading wire:target="save" />
            </div>
            <div class="flex flex-row font-medium space-x-3">
                <p>Valor total: <span wire:loading.remove wire:target="save" wire:text="price"></span></p>
                <flux:icon.loading wire:loading wire:target="save" />
            </div>
        </div>
    </div>

</div>

@push('scripts')
    @script
    <script>
        const errorMap = ["Número inválido", "Código de país inválido", "Curto demais", "Muito longo", "Número inválido"];

        const input = document.querySelector("#phone");

        const iti = window.intlTelInput(input, {
            initialCountry: "BR",
            separateDialCode: true,
            strictMode: true,
            nationalMode: true,
            loadUtils: () => import("https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.0/build/js/utils.js"),
        });

        $js('validatePhone', () => {
            const countryData = iti.getSelectedCountryData();
            $wire.$set('form.countryCode', countryData.dialCode);
            console.log($wire.form);
            if (!iti.isValidNumber()) {
                const errorCode = iti.getValidationError();
                const msg = errorMap[errorCode] || "Número inválido";
                $wire.setErrorMessage(msg);
            }
        })

        function initTelInput() {

        }
    </script>
    @endscript
@endpush