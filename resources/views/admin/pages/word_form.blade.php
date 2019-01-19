<?php
/**
 * Created by PhpStorm.
 * User: Sohel Rana
 * Date: 1/18/2019
 * Time: 10:44 PM
 */
$URL_asset = "public/assets/template/";

?>


@extends('admin.layouts.admin_app')
@section('content_body')


        <!-- Horizontal Form -->

@if(isset($word))
    <div class="col-md-offset-1 col-md-10">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Word</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{ route('word_edit_form_submit') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Topic</label>

                        <div class="col-sm-10">
                            <select name="topic_id" class="form-control">
                                <option>Select Topic</option>
                                @foreach($topics as $topic)
                                    <option value="{{$topic->id}}" <?php if($topic->id==$word->topic_id){echo "selected";}?>>{{$topic->title}}</option>
                                @endforeach
                                {{--<option selected>{{$word->topic_id}} </option>--}}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Word</label>

                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="" value="{{$word->title}}">
                            <input type="hidden" name="id" class="form-control" id="" value="{{$word->id}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">En-Meaning</label>

                        <div class="col-sm-10">
                            <input type="text" name="en_meaning" class="form-control" id=""
                                   value="{{$word->en_meaning}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Bn-Meaning</label>

                        <div class="col-sm-10">
                            <input type="text" name="bn_meaning" class="form-control" id="" value="{{$word->bn_meaning}}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Image</label>

                        <div class="col-sm-10">
                            <input type="file" name="img" class="form-control" id="" onchange="readURL(this)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label" >Image show</label>

                        <div class="col-sm-10">
                            <img src="{{asset($word->img)}}" name="" class="" id="img_show"
                                 style="width: 200px;height: 150px" >
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="reset" class="btn btn-default">Undo</button>
                    <button type="submit" class="btn btn-info pull-right">Update</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
        <!-- /.box -->
    </div>

@else
    <div class="col-md-offset-1 col-md-10">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Word</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{ route('word_form_submit') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Topic</label>

                        <div class="col-sm-10">
                            <select name="topic_id" class="form-control">
                                <option>Select Topic</option>
                                @foreach($topics as $topic)
                                    <option value="{{$topic->id}}">{{$topic->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Word</label>

                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="" placeholder="Arm">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">En-Meaning</label>

                        <div class="col-sm-10">
                            <input type="text" name="en_meaning" class="form-control" id=""
                                   placeholder="each of the two upper limbs of the human body from the shoulder to the hand.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Bn-Meaning</label>

                        <div class="col-sm-10">
                            <input type="text" name="bn_meaning" class="form-control" id="" placeholder="????" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Image</label>

                        <div class="col-sm-10">
                            <input type="file" name="img" class="form-control" id="" onchange="readURL(this)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Image show</label>

                        <div class="col-sm-10">
                            <img src="{{asset($URL_asset)}}/dist/img/user2-160x160.jpg" name="" class="" id="img_show"
                                 style="width: 200px;height: 150px">
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="reset" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-info pull-right">Add</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
        <!-- /.box -->
    </div>
@endif


<script type="text/javascript">
    function readURL(input) {
//        alert("ok");

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img_show').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>




@endsection
