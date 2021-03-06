@extends('layouts.sidebar')
@section('content')

<ul class="breadcrumbs">
  <li><a href="{{ URL::to('home') }}">หน้าหลัก</a></li>
  <li class="unavailable"><a href="#">พกส.(ปฏิบัติงาน)</a></li>
  <li class="current"><a href="#">กรอกเงินเดือน</a></li>
</ul>

<div class="">
  <div class="medium-8 columns">
    <h3>พกส.(ปฏิบัติงาน) : กรอกเงินเดือน</h3>
  </div>
  <div class="medium-4 columns">
     {{ Form::open( array( 'url' => 'emptype1/salary-search' ) ) }}
      <div class="row collapse">   
          <div class="large-8 small-9 columns">
            <input type="search" class="search" id="search_salary1" name="search_salary1" placeholder="ค้นหา CID, ชื่อ, นามสกุล"/>
          </div>
          <div class="large-4 small-3 columns">           
            {{ Form::submit( 'ค้นหา', array( 'class'=>'success postfix button' ) ) }} 
          </div>   
      </div>
     {{ Form::close() }}
  </div>
</div>

<div class="">
   <div class="large-12 columns">
      <table class="responsive">
      <tr>   
        <th width="40">#</th>    
        <th width="135">รหัสบัตรประชาชน</th>
        <th width="200">ชื่อ-นามสกุล</th>
        <th width="140">เลขที่บัญชี</th>
        <th width="77">เงินเดือน</th>
        <th width="70">อื่น ๆ</th>
        <th width="70">ประกันสังคม</th>  
        <th width="70">สหกรณ์</th>        
        <th width="95">เลขที่ภาษี</th>
        <th width="50">แก้ไข</th>
      </tr>

      <?php $i=0; ?>
        @foreach( $accall as $a )       
        <tr> 
          <td><?php echo $accall->getFrom()+$i; ?></td>             
          <td>{{ $a->cid }}</td>   
          <td>{{ $a->pname }}{{ $a->fname }} {{ $a->lname }}</td>  
          <td><span class="textacc1">{{ $a->bank_name }} {{ $a->bank_acc }}</span></td>  
          <td><span class="textsalary"><?php echo number_format( $a->salary, 2 ); ?></span></td>     
          <td><?php echo number_format( $a->salary_other, 2 ); ?></td> 
          <td><span class="textsso"><?php echo number_format( $a->salary_sso, 2 ); ?></span></td>  
          <td><span class=""><?php echo number_format( $a->salary_cprt, 2 ); ?></span></td>                      
          <td><span class="texttaxid">{{ $a->tax_id }}</span></td>    
          <td><a  title="แก้ไขข้อมูล" data-reveal-id="ModalSalary1" onclick="ModalSalary1( {{ $a->cid }}, '{{ $a->pname }}', '{{ $a->fname }}', '{{ $a->lname }}' )" href=""><i class="fi-page-edit small"></i></a></td>                        
        </tr> 
        <?php $i++;  ?>
        @endforeach   
  </table>

  <?php echo $accall->links(); ?>

   </div>
</div>



<div id="ModalSalary1" class="reveal-modal" data-reveal>
  <h3>กรอกเงินเดือน : <span id="ModalSalaryTitle1"></span></h3>

  <div id="fromSalary1"></div>
  
  <a class="close-reveal-modal">&#215;</a>
</div>



@stop
