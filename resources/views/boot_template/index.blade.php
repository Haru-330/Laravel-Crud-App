@extends('layouts.master_bootstrap') {{-- テンプレート（CSSカスタマイズ版）読み込み --}}
@section('title', 'Laravel CRUD APP チュートリアル') {{-- サイトタイトル定義 --}}
@section('content')
    <!-- Page Content -->
    <div id="page-content">
        <div class="container">
            <div class="row justify-content-left">
                <div class="col-md-12">
                    <h1 class="font-weight-light mt-4">Laravel CRUD APP チュートリアル</h1>
                    <p class="lead">
                        このページは「Laravel CRUD APP」のデモページです。<br>
                    </p>

                    <!-- Page Content -->
                    <div class="container mt-5">

                        <!-- 検索フォーム -->
                        <div class="row" style="padding-bottom: 30px; margin-left: 0px; margin-right: 15px;">
                            <div class="col-sm-10" style="padding-left:0;">
                                <form method="get" action="" class="form-inline">
                                    <div class="form-group">
                                        <input type="text" name="keyword" class="form-control" value="" placeholder="検索キーワード">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="検索" class="btn btn-info" style="margin-left: 15px; color:white;">
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-2" style="padding-left: 0;">
                                <a href="http://localhost/student/new" class="btn" style="background-color: #f0ad4e; color: white; width: 100px;"><i class="fas fa-plus"></i> 新規登録</a>
                            </div>
                        </div>

                        {{Form::open(['url' => '/', 'files' => true])}}
                        {{Form::token()}}

                            <!--テーブル-->
                            <div class="table-responsive">
                                <table class="table" style="width: 1000px; max-width: 0 auto;">
                                    <tr class="table-info">
                                        <th scope="col" width="10%">#</th>
                                        <th scope="col" width="15%">名前</th>
                                        <th scope="col" width="30%">Email</th>
                                        <th scope="col" width="15%">TEL</th>
                                        <th scope="col" width="30%" colspan="3">OPTION</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>ダミー　テスト①</td>
                                        <td>test1@test1.com</td>
                                        <td>080-1111-1111</td>
                                        <td><button type="button" class="btn btn-success">詳細</button></td>
                                        <td><button type="button" class="btn btn-primary">編集</button></td>
                                        <td><button type="button" class="btn btn-danger">削除</button></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>ダミー　テスト②</td>
                                        <td>test@test2.com</td>
                                        <td>080-2222-2222</td>
                                        <td><button type="button" class="btn btn-success">詳細</button></td>
                                        <td><button type="button" class="btn btn-primary">編集</button></td>
                                        <td><button type="button" class="btn btn-danger">削除</button></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>ダミー　テスト③</td>
                                        <td>test@test3.com</td>
                                        <td>080-3333-3333</td>
                                        <td><button type="button" class="btn btn-success">詳細</button></td>
                                        <td><button type="button" class="btn btn-primary">編集</button></td>
                                        <td><button type="button" class="btn btn-danger">削除</button></td>
                                    </tr>
                                </table>
                            </div>
                            <!--/テーブル-->

                        {{Form::close()}}

                    </div><!-- /container -->
                </div>
            </div>
        </div>
    </div>
    <!-- / Page Content -->
@endsection
