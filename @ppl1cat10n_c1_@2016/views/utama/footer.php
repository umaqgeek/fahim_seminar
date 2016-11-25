
<?php if(isset($error)) { ?>
<div class="modal collapse" id="basicModalError" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog" style="margin-top:10%;">
        <div class="modal-content">
            <div class="modal-header">
            	<i class="fa fa-exclamation-triangle fa-2x" style="color:#c0392b"></i>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" ></i></button>
            <br />
            </div>
            <div class="modal-body popup_yo">
                
                <table>
                    <tr>
                        <td align="center"><?=$error; ?></td>
                        <td width="10">&nbsp;</td>
                        <td width="5%" valign="bottom"><button type="button" class="button green-button" data-toggle="modal"  data-dismiss="modal" style="height:30px;line-height:5px;">OK</button></td>
                    </tr>
                </table>
            
            </div>
    </div>
  </div>
</div>
<?php } else if(isset($sucess)) { ?>
<div class="modal collapse" id="basicModalError" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog" style="margin-top:10%;">
        <div class="modal-content">
            <div class="modal-header">
             <i class="fa fa-check-circle fa-2x"  style="color:#27ae60;"></i>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" ></i></button>
            <br />
            </div>
            
            <div class="modal-body popup_yo">
                
                <table>
                    <tr>
                        <td align="center"><?=$sucess; ?></td>
                        <td width="10">&nbsp;</td>
                        <td width="5%" valign="bottom">
                            <button type="button" class="button green-button" data-toggle="modal" data-dismiss="modal" style="height:30px;line-height:5px;">OK</button>
                        </td>
                    </tr>
                </table>
            
            </div>
    </div>
  </div>
</div>
<?php } else if(isset($info)) { ?>
<div class="modal collapse" id="basicModalError" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            </div>
            
            <div class="modal-body popup_yo">
                
                <table>
                    <tr>
                        <td align="center"><?=$info; ?></td>
                        <td width="10">&nbsp;</td>
                        <td width="5%" valign="bottom">
                            <button type="button" class="button blue-button" data-toggle="modal"  data-dismiss="modal" style="height:30px;line-height:5px;">OK</button>
                        </td>
                    </tr>
                </table>
            
            </div>
    </div>
  </div>
</div>
<?php } ?>

<!-- Footer -->
<section id="footer" style="margin-top: 30%;">
    <div class="container">
        <ul class="copyright">
            <li>&copy; Nine 40 Trainer. All rights reserved.</li>
        </ul>
    </div>
</section>

</div>

</body>
</html>