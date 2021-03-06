<?php
use Illuminate\Routing\UrlGenerator;


function getCategories($array, $parentId, $char, $isParent)
{
    foreach ($array as $key => $value) {
        if ($value['parent'] == $parentId) {
            if ($value['id'] == $isParent) {
                echo '<option selected value="' . $value['id'] . '">' . $char . $value['name'] . '</option>';
            } else {
                echo '<option value="' . $value['id'] . '">' . $char . $value['name'] . '</option>';
            }
            $new_parent = $value['id'];
            getCategories($array, $new_parent, $char . "--|", $isParent);
        }
    }
}
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
            </svg> '.$session.' <a href="'.url()->full().'" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
        </div>
        ';
    } 
}
function ShowSessionDelete($session)
{
    if ($session) {
        echo '
        <div class="alert bg-danger" role="alert">
            <svg class="glyph stroked checkmark">
            <use xlink:href="#stroked-checkmark"></use>
            </svg> '.$session.' <a href="'.url()->full().'" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
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


//input $mang=$product->values   output: array('size'=>array(s,m),'color'=>array('Đỏ',Xanh)) 
function attr_values($mang)
{
    $result=array();
    foreach($mang as $value)
    {
        $attr=$value->attribute->name;
        // $value->value gán giá trị của cột value vào trong []
        $result[$attr][]=$value->value;
    }
    return $result;
}

// thêm biến thể
function get_combinations($arrays) {
	$result = array(array());
	foreach ($arrays as $property => $property_values) {
		$tmp = array();
		foreach ($result as $result_item) {
			foreach ($property_values as $property_value) {
				$tmp[] = array_merge($result_item, array($property => $property_value));
			}
		}
		$result = $tmp;
	}
	return $result;
}
// check value edit product
function check_value($product, $value_check) 
{
    foreach ($product->values as $value) {
        if($value->id ==$value_check){
            return true;
        }
    }
    return false;

}

// kiem tra bien the
function check_var($product, $array)
{
    foreach ($product->variant as $value) {
        $mang[]=$value->id;
        // tra ve 1 array bien the [do-XL]...
        // array_diff la ham so sanh 2 array
        if(array_diff($mang,$array)==null){
            return false;
        }
    }   
    return true;
    
}
// cart
function getprice($product,$array)
{
    foreach ($product->variant as $row) {
        $mang=array();
        foreach ($row->values as $value) {
            $mang[]=$value->value;
        }
        if(array_diff($mang,$array)==null){
            if($row->price==0){
                return $product->price;
            }
            return $row->price;
        }
    }
    return $product->price;
}