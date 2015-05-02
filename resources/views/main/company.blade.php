@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Меня/Нас обманула компания
                    </div>
                    <div class="panel-body">
                        <form method="post" action="/company">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <input class="form-control" name="deceiver" placeholder="Название компании"
                                       required="required">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="info"
                                          placeholder="Информация о компании, адрес, телефоны"></textarea>
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
                        <th class="col-md-2">Компания</th>
                        <th class="col-md-4">Отзыв</th>
                        <th class="col-md-4">Информация</th>
                        <th class="col-md-2">Дата</th>
                    </tr>
                    @if( !isset($companies) || !count($companies) )
                        <tr>
                            <td colspan="5">Пока пусто</td>
                        </tr>
                    @else
                        @foreach($companies as $company)
                            <tr>
                                <td>
                                    {{ $company->deceiver }}
                                </td>
                                <td>
                                    {{ $company->review }}
                                </td>
                                <td>
                                    {{ $company->info }}
                                </td>
                                <td>
                                    {{ $company->created_at }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection