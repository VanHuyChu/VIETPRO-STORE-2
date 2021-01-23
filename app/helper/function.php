<?php
function GetCategory($mang, $parent, $shift, $active)
{
    foreach ($mang as $row) {
        if ($row->parent == $parent) {
            if ($row->id == $active) {
                // Nếu Id cha = parent, thì hiển thị tên theo Id cha
                echo "<option selected value='$row->id'>" . $shift . $row->name . "</option>";
            } else {
                echo "<option value='$row->id'>" . $shift . $row->name . "</option>";
            }

            GetCategory($mang, $row->id, $shift . '---|', $active);
        }
    }
}

function ShowCategory($mang, $parent, $shift)
{
    foreach ($mang as $row) {
        if ($row->parent == $parent) {
            echo "<div class='item-menu'><span>" . $shift . $row->name . "</span>
        <div class='category-fix'>
            <a class='btn-category btn-primary' href='" . route('category.edit', ['id' => $row['id']]) . "'><i class='fa fa-edit'></i></a>
            <a class='btn-category btn-danger' href='" . route('category.del', ['id' => $row['id']]) . "'><i class='fas fa-times'></i></i></a>
        </div>
    </div>";
            ShowCategory($mang, $row->id, $shift . '---|');
        }
    }
}

function ShowSession($session)
{
    if ($session) {
        echo '
        <div class="alert bg-success" role="alert">
            <svg class="glyph stroked checkmark">
            <use xlink:href="#stroked-checkmark"></use>
            </svg> '.$session.' <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
        </div>
        ';
    } 
       
    
    
}
function showErrors($errors, $name)
{
    if($errors->has($name)){
        echo '<div class="alert bg-danger" role="alert">
    <svg class="glyph stroked cancel">
        <use xlink:href="#stroked-cancel"></use>
    </svg>'.$errors->first($name).'<a href="#" class="pull-right"><span
            class="glyphicon glyphicon-remove"></span></a>
</div>';
    }
    
}
function showErrors1($errors, $name){
    if ($errors->has($name)){
        echo'<div class="alert alert-danger" role="alert">
        <strong>'.$errors->first($name).'</strong>
    </div>';
    }
}