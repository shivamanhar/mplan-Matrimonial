<div class="container">
     <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered" >
                <tr><th class="col-md-2">From </th>
                <th class="col-md-7">Message</th> <th class="col-md-2"> Date</th></tr>
                <?php if(isset($send_message))
                {
                    foreach($send_message->result() as $row)
                    {?>
                <tr>
                    <td class="col-md-2"><?php echo "<a href='",base_url()."forme/get_user/".$row->from_to."'>".$this->muse->display_value('users', array('id'=> $row->from_to),'firstname' )."</a>";?></td>
                    <td class="col-md-7"><?php echo $row->message;?></td>
                    <td class="col-md-2"><?php echo date('d-M-Y',$row->date);?></td>
                </tr>
                <?php
                    }
                }?>
            
            </table>
            <?php echo $create_link;?>
        </div>
     </div>
</div>