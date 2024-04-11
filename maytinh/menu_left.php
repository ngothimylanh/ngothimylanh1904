	<style>
        a{
	color:#ec522b;
    }
         a:hover{
	color: #e7a985;
    }
        </style>
    <div class="row" >
    
            <div class="panel-group" id="accordion" >
            <?php 
			include('connect.php');
			$sl= "select * from menu_doc";
			$exec= mysqli_query($connect,$sl);
			$i=0;
			while($row= mysqli_fetch_array($exec)){
				$i=$i+1;
				switch($i){
					case 1: $num= "One"; break;
					case 2: $num= "Two"; break;
					case 2: $num= "Three"; break;
					case 3: $num= "Four"; break;
					case 4: $num= "Five"; break;
					case 5: $num= "Six"; break;
				}
		?>
                <div class="panel panel-primary" style="width: 280px; float: right; margin-right: 25px; border: 0.1px solid #ec522b;margin-top: 15px;">
                    <div class="panel-heading" style="cursor: pointer; border: 0.1px solid #ec522b; background-color: #ec522b; text-align: center;">
                        <h4 class="panel-title" >
                            <a data-toggle="collapse" style="text-decoration: none;color:#ffffff;" data-parent="#accordion" href="#collapse<?php echo $num; ?>"><?php echo $row['title'];  ?></a>
                        </h4>
                    </div>
                    <div id="collapse<?php echo $num; ?>" class="panel-collapse collapse out" >
                        <div class="panel-body" style="cursor: pointer; border: 0.1px solid #ec522b; text-align: center;">
                            <table class="table"  style="text-align: center;">
                            <?php if($row['sub_1']!=""){echo "    
                                <tr >
                                    <td >
                                        <a href=".$row['sub_1_link']." >".$row['sub_1']." </a>
                                    </td>
                                </tr>";}
                            ?>
                            <?php if($row['sub_2']!=""){echo "    
                                <tr>
                                    <td>
                                        <a href=".$row['sub_2_link'].">".$row['sub_2']."</a>
                                    </td>
                                </tr>";}
                            ?>
                               <?php if($row['sub_3']!=""){echo "    
                                <tr>
                                    <td>
                                        <a href=".$row['sub_3_link'].">".$row['sub_3']."</a>
                                    </td>
                                </tr>";}
                            ?>
                             <?php if($row['sub_4']!=""){echo "    
                                <tr>
                                    <td>
                                        <a href=".$row['sub_4_link'].">".$row['sub_4']."</a>
                                    </td>
                                </tr>";}
                            ?>
                            </table>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
    </div>
