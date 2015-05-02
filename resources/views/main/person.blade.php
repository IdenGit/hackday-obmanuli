@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Меня/Нас обманул человек
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="/person">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <input class="form-control" name="deceiver" placeholder="Имя мошенника"
                                       required="required">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="info"
                                          placeholder="Внешность, контакты и фио мошенника"></textarea>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="review"
                                          placeholder="Как именно вас обманули?"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">@</div>
                                    <input class="form-control" name="email" type="email" required="required"
                                           placeholder="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Пожаловатся</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
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
                        <th class="col-md-2">Человек</th>
                        <th class="col-md-4">Отзыв</th>
                        <th class="col-md-4">Информация</th>
                        <th class="col-md-2">Дата</th>
                    </tr>
                    @if( !isset($persons) || !count($persons) )
                        <tr>
                            <td colspan="5">Пока пусто</td>
                        </tr>
                    @else
                        @foreach($persons as $person)
                            <tr>
                                <td class="col-md-2">
                                    {{ $person->deceiver }}
                                </td>
                                <td class="col-md-4">
                                    {{ $person->review }}
                                </td>
                                <td class="col-md-4">
                                    {{ $person->info }}
                                </td>
                                <td class="col-md-2">
                                    {{ $person->created_at }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection