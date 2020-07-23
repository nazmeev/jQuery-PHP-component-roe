<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php JHtml::_('jquery.framework'); ?>
<?php JHTML::_('behavior.modal', "a.genModal"); ?>

<?php 
$maxH = $this->stopi;
$maxV = $this->stopj;
?>
<div class="container">
    <div class="row">
        <div class="col">
            <form class="form-inline" action="<?php echo JRoute::_('index.php?option=com_roe&view=roe'); ?>" method="GET">
                <div class="form-group">
                    <label>Vertical</label>
                    <select class="form-control mb-2" name="starti">
                        <option value="0" <?php if($this->starti == 0) echo "selected"; ?>>0</option>
                        <option value="100" <?php if($this->starti == 100) echo "selected"; ?>>100</option>
                        <option value="200" <?php if($this->starti == 200) echo "selected"; ?>>200</option>
                        <option value="300" <?php if($this->starti == 300) echo "selected"; ?>>300</option>
                        <option value="400" <?php if($this->starti == 400) echo "selected"; ?>>400</option>
                        <option value="500" <?php if($this->starti == 500) echo "selected"; ?>>500</option>
                        <option value="600" <?php if($this->starti == 600) echo "selected"; ?>>600</option>
                        <option value="700" <?php if($this->starti == 700) echo "selected"; ?>>700</option>
                        <option value="800" <?php if($this->starti == 800) echo "selected"; ?>>800</option>
                        <option value="900" <?php if($this->starti == 900) echo "selected"; ?>>900</option>
                        <option value="1000" <?php if($this->starti == 1000) echo "selected"; ?>>1000</option>
                        <option value="1100" <?php if($this->starti == 1100) echo "selected"; ?>>1100</option>
                        <option value="1200" <?php if($this->starti == 1200) echo "selected"; ?>>1200</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Horizontal</label>
                    <select class="form-control mb-2" name="startj">
                    <option value="0" <?php if($this->stopi == 0) echo "selected"; ?>>0</option>
                        <option value="100" <?php if($this->startj == 100) echo "selected"; ?>>100</option>
                        <option value="200" <?php if($this->startj == 200) echo "selected"; ?>>200</option>
                        <option value="300" <?php if($this->startj == 300) echo "selected"; ?>>300</option>
                        <option value="400" <?php if($this->startj == 400) echo "selected"; ?>>400</option>
                        <option value="500" <?php if($this->startj == 500) echo "selected"; ?>>500</option>
                        <option value="600" <?php if($this->startj == 600) echo "selected"; ?>>600</option>
                        <option value="700" <?php if($this->startj == 700) echo "selected"; ?>>700</option>
                        <option value="800" <?php if($this->startj == 800) echo "selected"; ?>>800</option>
                        <option value="900" <?php if($this->startj == 900) echo "selected"; ?>>900</option>
                        <option value="1000" <?php if($this->startj == 1000) echo "selected"; ?>>1000</option>
                        <option value="1100" <?php if($this->startj == 1100) echo "selected"; ?>>1100</option>
                        <option value="1200" <?php if($this->startj == 1200) echo "selected"; ?>>1200</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Confirm</button>
            </form>
        </div>
    </div>
</div>

    <br>
    <div class="row">
        
        <div class="col d-inline-flex">
            <table class="table table-bordered" id="area">
                
            </table>
        </div>
        
    </div>
    <a class="genModal" rel="{handler: 'iframe', size: {x: 800, y: 600}}" href="index.php?controller=roe&view=edit&i=0&j=0&tmpl=component"></a>

<style>
    .zoneArea{
        width: 150px;
        height: 150px;
        position: relative;
    }
    .zoneArea img{
        width: 50px;
        position: absolute;
        right: 0
    }
    td.cover1{
    background:
        linear-gradient(
            black, transparent 1px
        ),
        linear-gradient(
        90deg,
        black, transparent 1px
        );
        background-size: 11px 11px;
        background-position: center center;
        border: 2px solid black;
    }
    
</style>

<script>

    jQuery(function(){
        createArea(<?php echo $this->starti ?>, <?php echo $this->startj ?>, <?php echo $this->stopi; ?>, <?php echo $this->stopj; ?>, function(html){
            jQuery('#area').html(html)
            loadData()
            jQuery('.modalTD').on('click', function(e){
                let href = jQuery(this).attr('href')
                let button = document.querySelector('.genModal');
                button.setAttribute('href', href)
                button.click()
                // alert(jQuery(this).parent().attr('data-position'))
                e.preventDefault()
            })
        })
    })

    function createArea(iStart, jStart, iMax, jMax, callback){
        let txt = ''
        
        for (let i = iStart; i < iMax; i++) {
            txt += '<tr>'
            for (let j = jStart; j < jMax; j++) {
                txt += '<td data-position = '+i+'-'+j+'>'
                txt += '<div class="zoneArea">'
                txt += '<div class="data-castle"></div>'
                txt += createEditBtn(i, j, j+'-'+i)
                txt += '<div class="data-name font-weight-bold mt-2"></div>'
                txt += '<div class="data-comment"></div>'
                txt += '</div>'
                txt += '</td>'
            }
            txt += '</tr>'
        }
        callback(txt)
    }
    function createEditBtn(i, j, nameOfBtn){
        return `<a class="modalTD btn btn-light" rel="{handler: 'iframe', size: {x: 800, y: 600}}" href="index.php?controller=roe&view=edit&i=${i}&j=${j}&tmpl=component">${nameOfBtn}</a>`
    }
    function loadData(){
        jQuery.ajax({
            type: 'POST',
            dataType: 'json',
            // data: 'taskId='+id,
            url: 'index.php?option=com_roe&controller=roe&view=loadData',
            cache: false,
            success: function(json) {
                let count = 0
                json.forEach(element => {
                    count++
                    console.log(element.i+'-'+element.j+'-'+element.color+'-'+element.id)
                    let td = document.querySelector('td[data-position="'+element.i+'-'+element.j+'"]')
                    if(td === null){}else{
                        td.setAttribute('style', `background-color: ${element.color}`)
                        if(element.cover != '')
                            td.setAttribute('class', element.cover)
                        td.querySelector('.data-name').innerHTML = element.name
                        td.querySelector('.data-comment').innerHTML = element.comment
                        // td.querySelector('.data-castle').innerHTML = element.castle
                        if(element.castle != ''){
                            let srcCastle = '<img src="/components/com_roe/assets/images/'+element.castle+'">'
                            td.querySelector('.data-castle').innerHTML = srcCastle
                            // td.querySelector('.data-castle img').setAttribute('src', srcCastle)
                        }
                    }
                    // jQuery('td[data-position="'+element.i+'-'+element.j+'"]').css({'backgroundColor' : element.color});
                    // console.log(element)
                });
                console.log('total', count)
            }
        });
    }
    function updateData(element){
        let td = document.querySelector('td[data-position="'+element.i+'-'+element.j+'"]')
        
        td.setAttribute('style', "background-color:" + element.color)
        if(element.cover != '')
            td.classList.add(element.cover)
        else{
            let c = td.className
            if(c != '')
                td.classList.remove(c)
        }
        td.querySelector('.data-name').innerHTML = element.name
        td.querySelector('.data-comment').innerHTML = element.comment
        if(element.castle != ''){
            td.querySelector('.data-castle').innerHTML = '<img src="/components/com_roe/assets/images/'+element.castle+'">'
        }else{
            td.querySelector('.data-castle').innerHTML = ''

        }
        document.querySelector('#sbox-overlay').click()
    }
</script>