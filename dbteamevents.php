<?php
session_start();
try{
include("dbcon.php");
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$g_id=$_SESSION['g_id'];
if(isset($_POST['submittmeve'])){
   //insert team name in team table and update tid in event table
      $tnm=$_POST['etname'];
     
      //check for presence of tname and gid in team table
      $sql="select * from team where g_id=:gid && tname=:tnm";
      $stmt3 = $db->prepare($sql);
      $stmt3->execute(array(':gid'=>$g_id,':tnm'=>$tnm));
      $res=$stmt3->fetch();
      $tn=$res['tname'];
     
     
     
     if($tn==null){
      $sql="insert into team(g_id,tname) values (:gid,:tnm)";
      $stmt3 = $db->prepare($sql);
      $stmt3->execute(array(':gid'=>$g_id,':tnm'=>$tnm));
      }
      // $last_id = $stmt3->lastInsertId();

        //getting id
      $sql="SELECT t_id FROM team WHERE tname=:tnm and g_id=:gid";
      $stmt1 = $db->prepare($sql);
      $stmt1->execute(array(':tnm'=>$tnm,':gid'=>$g_id));
      $result=$stmt1->fetch();
      $tid=$result['t_id'];
			

       //update in events table
       $sql = "update events set t_id=:tid where g_id=:gid";
       $stmt2 = $db->prepare($sql);
      $result=$stmt2->execute(array(':tid'=>$tid,':gid'=>$g_id));

        //validate gid for team membe
        $valid1=0;$valid2=0;$valid3=0;$valid4=0;$valid5=0;

        $sql="SELECT * FROM users WHERE g_id=:gid";
        $stmt1 = $db->prepare($sql);
        
        
        if(!empty($_POST['emate1'])){
          $emate1=$_POST['emate1'];
          if($emate1!=$g_id){
          $stmt1->execute(array(':gid'=>$emate1));
          $result=$stmt1->fetch();
          $gid1 = $result['g_id'];
          if($gid1==null){echo 'error 1'; exit(); }
          $valid1=1;
        }}
        
        if(!empty($_POST['emate2'])){
          $emate2=$_POST['emate2'];
          if($emate2!=$g_id){
          $stmt1->execute(array(':gid'=>$emate2));
          $result=$stmt1->fetch();
          $gid2 = $result['g_id'];
          if($gid2==null){echo 'error 2'; exit(); }
          $valid2=1;
        }}

        if(!empty($_POST['emate3'])){
          $emate3=$_POST['emate3'];
          if($emate3!=$g_id){
          $stmt1->execute(array(':gid'=>$emate3));
          $result=$stmt1->fetch();
          $gid3 = $result['g_id'];
          if($gid3==null){echo 'error 3'; exit(); }
          $valid3=1;
        }}

        if(!empty($_POST['emate4'])){
          $emate4=$_POST['emate4'];
          if($emate4!=$g_id){
          $stmt1->execute(array(':gid'=>$emate4));
          $result=$stmt1->fetch();
          $gid4 = $result['g_id'];
          if($gid4==null){echo 'error 4'; exit(); }
          $valid4=1;
        }}
        if(!empty($_POST['emate5'])){
          $emate5=$_POST['emate5'];
          if($emate5!=$g_id){
          $stmt1->execute(array(':gid'=>$emate5));
          $result=$stmt1->fetch();
          $gid5 = $result['g_id'];
          if($gid5==null){echo 'error 5'; exit(); }
          $valid5=1;
        }}


        //for echo selection
        $p1=1;$p2=1;$p3=1;$p4=1;$p5=1;

        //statemnt prepare for presence of mate in events table
        $sql="SELECT * FROM events WHERE g_id=:gid";
        $stmt1 = $db->prepare($sql);
        
        //update tid for events table
        $sql = "update events set t_id=:tid where g_id=:gid";
       $stmt2 = $db->prepare($sql);

       //statement prepare for insert into event of mate
       $sql="insert into events(g_id,t_id) values (:gid,:tid)";
          $stmt3 = $db->prepare($sql);
         
      

      if($valid1==1){
        $stmt1->execute(array(':gid'=>$emate1));
        $result=$stmt1->fetch();
		  	$emt1 = $result['g_id'];
        $etid1=$result['t_id'];
        if($emt1!=null && $etid1==null){
          $result=$stmt2->execute(array(':tid'=>$tid,':gid'=>$emt1));
        }
      else if($emt1!=null && $etid1!=null){
            //$p1=0;
            echo 'team 1'; exit();
            
         }
      else{
          $stmt3->execute(array(':gid'=>$emate1,':tid'=>$tid));
        }
      }
      
      if($valid2==1){
        $stmt1->execute(array(':gid'=>$emate2));
        $result=$stmt1->fetch();
		  	$emt2 = $result['g_id'];
        $etid2=$result['t_id'];
         if($emt2!=null  && $etid2==null){
        $result=$stmt2->execute(array(':tid'=>$tid,':gid'=>$emt2));
      }
      else if($emt2!=null  && $etid2!=null){
            //$p2=0;
            echo 'team 2'; exit();
       }
        else{
           $stmt3->execute(array(':gid'=>$emate2,':tid'=>$tid));
       }
      }
      
      if($valid3==1){
         $stmt1->execute(array(':gid'=>$emate3));
        $result=$stmt1->fetch();
		  	$emt3 = $result['g_id'];
        $etid3=$result['t_id'];
        if($emt3!=null && $etid3==null){
        //update tid in events table
       $result=$stmt2->execute(array(':tid'=>$tid,':gid'=>$emt3));
       }
      else if($emt3!=null && $etid3!=null){
        //$p3=0;
        echo 'team 3'; exit();
        }
      else{
           $stmt3->execute(array(':gid'=>$emate3,':tid'=>$tid));
       }
      
      }
      
      if($valid4==1){
        $stmt1->execute(array(':gid'=>$emate4));
        $result=$stmt1->fetch();
		  	$emt4 = $result['g_id'];
        $etid4=$result['t_id'];
      if($emt4!=null && $etid4==null){
        //update tid in events table
        $result=$stmt2->execute(array(':tid'=>$tid,':gid'=>$emt4));
      }
      else if($emt4!=null && $etid4!=null){
            //$p4=0;
            echo 'team 4'; exit();
      }
      else{
        //echo 'Your team member '.$emt4.'has not registered with any events';
          $stmt3->execute(array(':gid'=>$emate4,':tid'=>$tid));
        }
      }
      
      if($valid5==1){
        $stmt1->execute(array(':gid'=>$emate5));
        $result=$stmt1->fetch();
		  	$emt5 = $result['g_id'];
        $etid5=$result['t_id'];
        
      if($emt5!=null && $etid5==null){
        //update tid in events table
        $result=$stmt2->execute(array(':tid'=>$tid,':gid'=>$emt5));
       }
      else if($emt5!=null && $etid5!=null){
        //$p5=0;
      //  echo 'success '.$tnm.'<br/>Your team mate'.$emt5.' is in another team. Cannot be added to your team';
        echo 'team 5'; exit();
      }
      else{
        //echo 'Your team member '.$emt5.'has not registered with any events';
          $stmt3->execute(array(':gid'=>$emate5,':tid'=>$tid));
        //  echo 'success '.$tnm;
      }
      }

      if($p1==1 && $p2==1 && $p3==1 && $p4==1 && $p5==1){
        echo 'crtd '.$tnm;
      }
      else{
        echo 'ncrtd '.$tnm.'<br/> Your friends';
        if($p1==0){echo '<br/>'.$emt1.' ';}
        if($p2==0){echo '<br/>'.$emt2.' ';}
        if($p3==0){echo '<br/>'.$emt3.' ';}
        if($p4==0){echo '<br/>'.$emt4.' ';}
        if($p5==0){echo '<br/>'.$emt5.' ';}
        echo '<br/> Present in another team.<br/> Cannot be added to your team';
      }
}
}
catch(PDOException $e){
$e->getMessage();
}
?>