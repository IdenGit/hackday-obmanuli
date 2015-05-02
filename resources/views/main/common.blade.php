<h1 style="text-align: center">Список обманщиков и мошенников</h1>
<div class="col-md-12">
    <div class="form-group row">
        <form class="input-group col-md-8 col-md-offset-2 js-search">
            <input class="form-control js-find" name="some">
            <div class="input-group-addon" style="cursor: pointer">
                <span class="glyphicon glyphicon-search" onclick="$('.js-search').submit()"></span>
            </div>
        </form>
    </div>
    <table class="table table-condensed table-bordered">
        <tr>
            <th class="col-md-2">Компания или человек</th>
            <th class="col-md-4">Отзыв</th>
            <th class="col-md-4">Информация</th>
            <th class="col-md-1 visible-md visible-lg">Тип</th>
            <th class="col-md-1 visible-md visible-lg">Дата</th>
        </tr>
        @if( !isset($somes) || !count($somes) )
            <tr>
                <td colspan="5">Пока пусто</td>
            </tr>
        @else
            @foreach($somes as $some)
                <tr>
                    <td>
                        {{ $some->deceiver }}
                    </td>
                    <td>
                        {{ $some->review }}
                    </td>
                    <td>
                        {{ $some->info }}
                    </td>
                    <td class="visible-md visible-lg">
                        @if( $some->type == 'person' )
                            человек
                        @else
                            компания
                        @endif
                    </td>
                    <td class="visible-md visible-lg">
                        {{ $some->created_at }}
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
</div>