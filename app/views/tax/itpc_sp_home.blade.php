@extends('layouts.sidebar')
@section('content')
<ul class="breadcrumbs">
  <li><a href="{{ URL::to('home') }}">หน้าหลัก</a></li>
  <li class="unavailable"><a href="#">รายงาน</a></li>
  <li class="unavailable"><a href="#">ภาษีค่าตอบแทน ข้าราชการ-ลูกจ้างประจำ ภ.ง.ค.1 ก</a></li>
  <li class="current"><a href="#">เลือกช่วงข้อมูล</a></li>
</ul>

{{ Form::open( array( 'url' => 'tax3/itpc_sp', 'data-abide' => '' ) ) }}
<fieldset>
<h2>ภาษีค่าตอบแทน ข้าราชการ-ลูกจ้างประจำ ภ.ง.ค.1 ก เลือกช่วงข้อมูล</h2>  

<div class="row">
	<div class="large-12 columns">
	{{ Form::label( 'level', 'เลือกปี :', array( 'class' => 'uk-form-label' ) ) }}		
	   <select id="y_sp" name="y_sp" class=""> 
          @foreach( $data as $a )              
           <option  value="{{ $a->year1 }}">{{ $a->year1 }}</option>        
          @endforeach
        </select>  
	</div>
</div> 
<hr />
<div class="row">
	<div class="large-12 columns">			
		{{ Form::submit( 'ส่งออกรายงาน', array( 'class'=>'small button' ) ) }}
	</div>
</div> 
 
</fieldset>
 {{ Form::close() }}
	
@stop