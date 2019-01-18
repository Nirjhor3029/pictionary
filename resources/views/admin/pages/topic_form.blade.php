<?php
/**
 * Created by PhpStorm.
 * User: Sohel Rana
 * Date: 1/18/2019
 * Time: 12:35 PM
 */
//echo "nirjhor";

?>

@extends('admin.layouts.admin_app')
@section('content_body')


        <!-- Horizontal Form -->

@if(isset($topic))
    <div class="col-md-offset-3 col-md-6">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Topic</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{ route('topic_edit_form_submit') }}">
                {{ csrf_field() }}

                <div class="box-body">

                    <div class="form-group">

                        <label for="inputEmail3" class="col-sm-2 control-label">Id</label>

                        <div class="col-sm-10">

                            <input type="text" name="" class="form-control"  value="{{$topic->id}}" disabled>
                            <input type="hidden" name="id" class="form-control"  value="{{$topic->id}}" >
                        </div>
                    </div>
                    <div class="form-group">

                        <label for="inputEmail3" class="col-sm-2 control-label">Topic</label>

                        <div class="col-sm-10">

                            <input type="text" name="title" class="form-control" id="inputEmail3"
                                   placeholder="Human body parts" value="{{$topic->title}}">
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
    <div class="col-md-offset-3 col-md-6">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Topic</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{ route('topic_form_submit') }}">
                {{ csrf_field() }}

                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Topic</label>

                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="inputEmail3"
                                   placeholder="Human body parts">
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





@endsection


