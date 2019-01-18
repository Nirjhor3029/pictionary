<?php
/**
 * Created by PhpStorm.
 * User: Sohel Rana
 * Date: 1/18/2019
 * Time: 3:52 PM
 */

$URL_asset = "public/assets/template/";

?>

@extends('admin.layouts.admin_app')
@section('content_body')

    {{--{{ $topics}}--}}

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">

                    <div class="box-header">
                        <h3 class="box-title">Total Topics ( {{count($topics)}} )</h3>

                        <div class="row">
                            <div class="col-sm-3 text-right"><a href="{{route('topic_form')}}" class="btn btn-primary">Add New</a></div>
                            <div class="col-sm-1 text-right"><i class="fa fa-search"></i></div>
                            <div class="col-sm-4">
                                <input type="text" id="myInput_id" class="form-control input-sm" onkeyup="myFunction(this)" placeholder="ID" >
                            </div>
                            <div class="col-sm-4">
                                <input type="text" id="myInput_title" class="form-control input-sm" onkeyup="myFunction(this)" placeholder="Title" >
                            </div>
                        </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Id</th>
                                <th>Title</th>
                                <th>extra</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($topics as $topic)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$topic->id}}</td>
                                    <td>{{$topic->title}}</td>
                                    <td>{{$topic->created_at}}</td>
                                    <td>
                                        <a href="{{URL::to('manage-topic/edit/'.$topic->id)}}" class="btn btn-success">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{URL::to('manage-topic/delete/'.$topic->id)}}" class="btn btn-danger" onclick=" return confirmDelete()">
                                            <i class="fa fa-remove"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $i++; ?>

                            @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <script type="text/javascript">
        $(document).ready(function () {
//            alert("ready");
            $('#topic_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{route('manage_topis.getdata')}}",
                "columns": [
                    {"data": "id"},
                    {"data": "title"}
                ]
            });
        });
    </script>


    <script>
        function myFunction(ob) {
            console.log(ob.id);
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById(ob.id);
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                if(ob.id == "myInput_title"){
                    column_index = 2;
                }else{
                    column_index = 1;
                }
                td = tr[i].getElementsByTagName("td")[column_index];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function confirmDelete(){
            return confirm("Are you sure to delete the data ! ");
        }
    </script>


@endsection

