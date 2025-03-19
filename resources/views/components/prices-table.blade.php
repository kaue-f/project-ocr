<table class="table-auto w-full">
    <thead>
        <tr class="border-b border-zinc-500">
            <th>Idiomas</th>
            <th>Preços</th>
        </tr>
    </thead>
    <tbody>
        @foreach (\App\Enums\Language::getPrices() as $key => $item)
        <tr class="text-center border-b border-zinc-600">
            <td>{{$key}}</td>
            <td>{{Number::currency($item, in: 'BRL', locale: 'pt_br')}}</td>
        </tr>
        @endforeach
    </tbody>
</table>