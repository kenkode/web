<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style type="text/css">

table {
  max-width: 100%;
  background-color: transparent;
}
th {
  text-align: left;
}
.table {
  width: 100%;
  margin-bottom: 2px;
}
hr {
  
  border: 0;
  border-top: 2px dotted #eee;
}

body {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 12px;
  line-height: 1.428571429;
  color: #333;
  background-color: #fff;
}



 @page  { margin: 170px 30px; }
 .header { position: fixed; left: 0px; top: 0px; right: 0px; height: 150px;  text-align: center; }
 .content {margin-top: 10px; }
 .footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 50px;  }
 .footer .page:after { content: counter(page, upper-roman); }



</style>

</head>

<body>

  <div class="header">
     <table >

      <tr>


       
        <td style="width:150px">

            <?php if($organization->logo == null || $organization->logo == ''): ?>
            <?php else: ?>
            <img src="<?php echo e(public_path().'/uploads/logo/'.$organization->logo); ?>" alt="logo" width="80%" alt="no logo">
            <?php endif; ?>

    
        </td>

        <td>
        <strong>
          <?php echo e(strtoupper($organization->name)); ?><br>
          </strong>
          <?php echo e($organization->phone); ?>,<br>
          <?php echo e($organization->email); ?>,<br>
          <?php echo e($organization->address); ?>

       

        </td>
        

      </tr>


    </table>
   </div>

<br>
<?php $currency = ''; ?>
<?php if($organization->currency_shortname == null || $organization->currency_shortname == ''): ?>
<?php $currency = 'KES'; ?>
<?php else: ?>
<?php $currency = $organization->currency_shortname; ?>
<?php endif; ?>
 
	<div class="content" style='margin-top:170px;'>
 
   <div align="center"><h3><strong>Events report</strong></h3></div>
    <table class="table table-bordered" border='1' cellspacing='0' cellpadding='0'>

      <tr>
     

        <td><strong>#</strong></td>
        <td><strong>Logo </strong></td>
        <td><strong>Name</strong></td>
        <td><strong>Description</strong></td>
        <td><strong>Contact</strong></td>
        <td><strong>Address</strong></td>
        <td><strong>VIP Entrance Fee (<?php echo e($currency); ?>)</strong></td>
        <td><strong>Normal Entrance Fee (<?php echo e($currency); ?>)</strong></td>
        <td><strong>Children Entrance Fee (<?php echo e($currency); ?>)</strong></td>
      </tr>
      <?php $i =1; 
            $viptotal = 0;
            $normaltotal = 0;
            $childrentotal = 0;
      ?>
      <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <tr>
          <td valign="top"><?php echo e($i); ?></td>
            <?php if($organization->logo == null || $organization->logo == ''): ?>
            <td></td>
            <?php else: ?>
            <td><img src="<?php echo e(public_path().'/uploads/logo/'.$event->image); ?>" width="100" height="100" alt="no logo" /></td>
            <?php endif; ?>
          <td valign="top"><?php echo e($event->name); ?></td>
          <td valign="top"><?php echo e($event->description); ?></td>
          <td valign="top"><?php echo e($event->contact); ?></td>
          <td valign="top"><?php echo e($event->address); ?></td>
          <td valign="top" align="right"><?php echo e(number_format($event->vip,2)); ?></td>
          <td valign="top" align="right"><?php echo e(number_format($event->normal,2)); ?></td>
          <td valign="top" align="right"><?php echo e(number_format($event->children,2)); ?></td>
      <?php
       $viptotal = $viptotal + $event->vip;
       $normaltotal = $normaltotal + $event->normal;
       $childrentotal = $childrentotal + $event->children;
       $i++; ?>
   
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <tr>
      <td colspan="6" align="right"><strong>Total</strong></td><td align="right"><strong><?php echo e(number_format($viptotal,2)); ?></strong></td><td align="right"><strong><?php echo e(number_format($normaltotal,2)); ?></strong></td><td align="right"><strong><?php echo e(number_format($childrentotal,2)); ?></strong></td>
    </tr>
      
    </table>

<br><br>

   
</div>


</body>

</html>



