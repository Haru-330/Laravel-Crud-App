@extends('layouts.master_bootstrap') {{-- テンプレート（CSSカスタマイズ版）読み込み --}}
@section('title', 'Laravel CRUD APP チュートリアル') {{-- サイトタイトル定義 --}}
@section('btn-dell')
<script>
$(function (){
    $(".btn-dell").click(function(){
        if(confirm("本当に削除しますか？")){
            // そのままsubmit処理を実行（※削除）
        }else{
            // キャンセル
            return false;
        }
    });
});
</script>
@endsection
@if(Session::has('flashmessage'))
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script>
        //ページ読み込み後、モーダルを実行
        $(window).on('load', function (){
            $('#modal_box').modal('show');
        });
    </script>

    <!-- モーダルウィンドウの中身 -->
    <div class="modal fade" id="modal_box" tabindex="-1"
         role="dialog" aria-labelledby="label1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label1">「Laravel CRUD APP」デモ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ session('flashmessage') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>
@endif
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
                        <div class="row" style="padding-bottom: 30px; margin-left: 0px; margin-right: 15px;">
                            <div class="col-sm-10" style="padding-left:0;">
                                <!-- 検索フォーム -->
                                <form method="get" action="" class="form-inline">
                                    <div class="form-group">
                                        <input type="text" name="keyword" class="form-control" value="{{$keyword}}" placeholder="名前やメールアドレス">
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
                            @foreach($students as $student)
                            <tr>
                                <th scope="row">{{$student->id}}</th>
                                <td>{{$student->name}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->tel}}</td>
                                <td><a href="/student/detail/{{$student->id}}"><button type="button" class="btn btn-success">詳細</button></a></td>
                                <td><a href="/student/edit/{{$student->id}}"><button type="button" class="btn btn-primary">編集</button></a></td>
                                <td>
                                    <form action="/student/delete/{{$student->id}}" method="POST">
                                    @method('DELETE')
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-danger btn-dell" value="削除">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </table>
                            </div>
                            <!--/テーブル-->
                            <!-- ページネーション -->
                            {!! $students->appends(['keyword'=>$keyword])->render() !!}
                    </div><!-- /container -->
                </div>
            </div>
        </div>
    </div>
    <!-- / Page Content -->
@endsection
