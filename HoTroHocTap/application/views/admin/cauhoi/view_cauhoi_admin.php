<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý câu hỏi</h1>
    </div>
                <!--End Page Header -->
</div>
<div class="row">
    <!-- Thông báo-->
    <?php if($this->session->flashdata('count') != "" ): ?>
        <div class="col-md-12">
          <div class="row" id="thongbao">
            <div class="alert alert-info alert-dismissible fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Thông báo!</strong> Đã thêm <?php echo $this->session->flashdata('count'); ?> câu hỏi
            </div>
          </div>
        </div>
      <?php endif; ?>
        <!-- Thông báo-->
    <div class="col-lg-12">
        <button class="btn btn-primary" id="show-add-btn">Thêm câu hỏi</button>
        <div class="row">&nbsp;</div>
        
    </div>
</div>
<div class="content-wrapper" id="add-form">

  <section class="content-header">
    <h1>
      Import câu hỏi, đáp án
    </h1>
    <ol class="breadcrumb">
      <li><a href="{$url}trangchu"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li class="active">Import câu hỏi, đáp án </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Import câu hỏi, đáp án</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <form action="<?php echo base_url('admin/cdanhmuccauhoi/them'); ?>" method="POST"  enctype="multipart/form-data" class="form-inline">
                <div class="col-md-12">
                  <div class="col-md-4">
                    <span><b>Chọn file excel *.xls</b></span>
                  </div>
                  <div class="col-md-4">
                    <input type="file" accept="application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" name="file_import">
                  </div>
                  <div class="col-md-4">
                    <button type="submit" name="import" value="import" class="btn btn-success btn-flat btn-sm">import<i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
                  </div>
                </div>
              </form>
            </div>
            <br><br><br>
            <div class="row">
              <div class="col-md-12">
                <div class="alert alert-success flat" role="alert">
                  Chú ý: File Excel phải có định dạng .xls và theo một định dạng sau.<br>
                  - Dữ liệu sẽ được đọc từ dòng số 2 trong file excel, vì vậy cần loại bỏ những trường không cần thiết trước khi import.<br>
                  - Thứ tự các cột: [A]-Mã môn( <a href="<?php echo base_url('admin/cdanhmucmonhoc'); ?>" target="_blank">xem ở quản lý môn học</a>), [B]-Mã loại câu hỏi(de,tb,kho, khohn), [C]-Nội dung câu hỏi, [D]->[I]-Nội dung câu trả lời, [J]->[O]-Ô đáp án đúng(từ D->I).
                  <br><a style="color: #3366CC" target="_blank" href="<?php echo base_url(); ?>attachment/files/ImportCauHoiFitHouQuiz.xls">Download file excel mẫu</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.row -->


  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<div class="row" id="vue" >
  <div class="col-md-12">
    <div class="col-md-2">
      <h4>Môn học: </h4>
    </div>
    <div class="col-md-3">
      <select class="form-control" id="sel1" v-model="monhoc" v-on:change="ChonMonHoc" >
        <option value="">--Chọn môn học--</option>
        <?php foreach($monhoc as $row): ?>
          <option value="<?php echo $row['mamon']; ?>"><?php echo $row['tenmon']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

	<div class="col-md-12">
		<div class="panel panel-default">
                        <div class="panel-heading">
                             Danh sách câu hỏi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-responsive table-hover" id="tbl-cauhoi">
                                    <thead>
                                        <tr>
                                            <td>Mã</td> 
                                            <td>Môn học</td>
                                            <td>Độ khó</td>
                                            <td>Nội dung</td>
                                            <td>Thao tác</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($records as $row):?>
											<tr>
												<td><?php echo($row['macauhoi']);?></td>
												<td><?php echo($row['tenmon']); ?></td>
												<td><?php echo($row['chuthich']); ?></td>
												<td><?php echo($row['noidung']); ?></td>
												<td>
                          <a href="<?php echo base_url('admin/cdanhmuccauhoi/xem?macauhoi='.$row['macauhoi']); ?>"><span class="glyphicon glyphicon-th-list"></span></a>
                          <a href="<?php echo base_url('admin/cdanhmuccauhoi/sua?macauhoi='.$row['macauhoi']); ?>"><span class="glyphicon glyphicon-edit"></span></a>
												  <a onclick="return confirmAction()" href="<?php echo  base_url('admin/cdanhmuccauhoi/xoa?macauhoi='.$row['macauhoi']); ?>"><span class="glyphicon glyphicon-remove"></span></a>

												</td>
											</tr>
										<?php endforeach; ?>


                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>

	</div>
</div>

<script type="text/javascript" src="<?php echo base_url('bootstrap/js/vue.js'); ?>"></script>
<script type="text/javascript">
	$(document).ready(function (){
        $('#tbl-cauhoi').DataTable(
        {
          "language" :{
            "lengthMenu": "Hiển thị _MENU_ bản ghi/trang",
            "info": "Trang _PAGE_ trên _PAGES_",
            "search" : "Tìm kiếm",
            "paginate": {
              "previous": "Trang trước",
              "next" : "Trang sau"
            }
          }

        }
        );
        $("#add-form").hide();
       
    });

    $("#show-add-btn").click(function(){
        $("#add-form").toggle();
    });

  var vm = new Vue({
    el: '#vue',
    data: {
      monhoc: ""
    },
    methods: {
      ChonMonHoc : function(){
        var url="";
        if(this.monhoc != ""){
          url = "<?php echo base_url('admin/cdanhmuccauhoi/danhsachcauhoi/'); ?>" + this.monhoc;

        }else{
          url = "<?php echo base_url('admin/cdanhmuccauhoi/danhsachcauhoi'); ?>";
        }

        console.log(url);
        $.ajax({
            url : url,
            type : "GET",
            dataType: "JSON",
            success: function(data){
              var str ='';
              
              $.each(data,function(i,o){
                  str += '<tr><td>'+o.macauhoi+'</td><td>'+o.tenmon+'</td><td>'+o.chuthich+'</td><td>'+o.noidung+'</td><td><a href="<?php echo base_url('admin/cdanhmuccauhoi/xem?macauhoi=');?>'+o.macauhoi+'"><span class="glyphicon glyphicon-th-list"></span></a> <a href="<?php echo base_url('admin/cdanhmuccauhoi/sua?macauhoi=');?>'+o.macauhoi+'"><span class="glyphicon glyphicon-edit"></span></a> <a onclick="return confirmAction()" href="<?php echo  base_url('admin/cdanhmuccauhoi/xoa?macauhoi=');?>'+o.macauhoi+'"><span class="glyphicon glyphicon-remove"></span></a></td></tr>';
              });

              $("#tbl-cauhoi tbody").empty().append(str);
              
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Có lỗi khi load dữ liệu');
            }
        });

      }
    }
  })


</script>


