<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php JHtml::_('jquery.framework'); ?>
<form action = "<?php echo JRoute::_('index.php?option=com_roe&controller=roe&view=save'); ?>" class="" role="form" method="POST" data-toggle="validator" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="control-group">
                    <label type="text" for="name" class="control-label"><?php echo JText::_('Name');?></label>
                    <div class="controls">
                        <input type="text" id="name" name="name" value="<?php echo $this->item->name; ?>"> 
                    </div>
                </div>
                
                <div class="control-group">
                    <div class="controls">
                        <select name="castle">
                            <option value=""  > </option>
                            <option value="Castle-black.png"  <?php if($this->item->castle == 'Castle-black.png')  echo 'selected'; ?>>Castle black </option>
                            <option value="Castle-green.png"  <?php if($this->item->castle == 'Castle-green.png')  echo 'selected'; ?>>Castle green </option>
                            <option value="Castle-red.png"    <?php if($this->item->castle == 'Castle-red.png')    echo 'selected'; ?>>Castle red   </option>
                            <option value="Castle-yellow.png" <?php if($this->item->castle == 'Castle-yellow.png') echo 'selected'; ?>>Castle yellow </option>
                            <option value="tile-black.png"    <?php if($this->item->castle == 'tile-black.png')    echo 'selected'; ?>>Tile black</option>
                            <option value="tile-green.png"    <?php if($this->item->castle == 'tile-green.png')    echo 'selected'; ?>>Tile green</option>
                            <option value="tile-red.png"      <?php if($this->item->castle == 'tile-red.png')      echo 'selected'; ?>>Tile red</option>
                            <option value="tile-yellow.png"   <?php if($this->item->castle == 'tile-yellow.png')   echo 'selected'; ?>>Tile yellow</option>
                            <option value="guardian.png"      <?php if($this->item->castle == 'guardian.png')      echo 'selected'; ?>>Guardian</option>
                            <option value="fort.png"      <?php if($this->item->castle == 'fort.png')      echo 'selected'; ?>>Fort</option>
                            <option value="camp.png"      <?php if($this->item->castle == 'camp.png')      echo 'selected'; ?>>Camp</option>
                            <option value="manufacture.png"      <?php if($this->item->castle == 'manufacture.png')      echo 'selected'; ?>>Manufacture</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <select name="color">
                        <option value=""  > </option>
                        <option value="LightGray"  <?php if($this->item->color == 'LightGray')  echo 'selected'; ?>>LightGray </option>
                        <option value="green"       <?php if($this->item->color == 'green')  echo 'selected'; ?>>green </option>
                        <option value="red"         <?php if($this->item->color == 'red')    echo 'selected'; ?>>red   </option>
                        <option value="yellow"      <?php if($this->item->color == 'yellow') echo 'selected'; ?>>yellow</option>
                        <option value="white"       <?php if($this->item->color == 'white')  echo 'selected'; ?>>white</option>
                        <option value="pink"        <?php if($this->item->color == 'pink')  echo 'selected'; ?>>pink</option>
                        <option value="Orange"  <?php if($this->item->color == 'Orange')  echo 'selected'; ?>>Orange</option>
                        <option value="Tomato"  <?php if($this->item->color == 'Tomato')  echo 'selected'; ?>>Tomato</option>
                        <option value="Violet"  <?php if($this->item->color == 'Violet')  echo 'selected'; ?>>Violet</option>
                        <option value="DodgerBlue"  <?php if($this->item->color == 'DodgerBlue')  echo 'selected'; ?>>DodgerBlue</option>
                        <option value="MediumSeaGreen"  <?php if($this->item->color == 'MediumSeaGreen')  echo 'selected'; ?>>MediumSeaGreen</option>
                        <option value="SlateBlue"  <?php if($this->item->color == 'SlateBlue')  echo 'selected'; ?>>SlateBlue</option>
                    </select>
                </div>
                <div class="control-group">
                    <select name="cover">
                        <option value=""  > </option>
                        <option value="cover1"  <?php if($this->item->cover == 'cover1')  echo 'selected'; ?>>style1 </option>
                    </select>
                </div>
               
                <div class="control-group">
                    <div class="controls">
                    <button class="btn btn-primary" type="submit"><?php echo JText::_('SAVE');?></button>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Comment</label>
                    <textarea name="comment" class="form-control" rows="3"><?php echo $this->item->comment; ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="<?php echo $this->j; ?>" name="j">
    <input type="hidden" value="<?php echo $this->i; ?>" name="i">
    <input type="hidden" value="<?php echo $this->item->id; ?>" name="id">
    <?php echo JHTML::_( 'form.token' ); ?>
</form>