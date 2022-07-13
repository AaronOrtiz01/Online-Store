<?php

function productElement($productname, $productprice, $productimg, $productid, $productstock, $active){
    if($active == 1){
    $element = '
    <div class="col-md-3 col-sm-6 my-3 my-md-0">
    <form action="index.php" method="post">
        <div class="card shadow">
            <div>
            <img src="'. $productimg . '" alt="Image1" class = "img-fluid card-img-top">
            </div>
            <div class="card-body">
                <h5 class="card-title">' . $productname .'</h5>
                <!-- -->
                <p class="card-text">
                    Best seller!
                </p>
                <h5>
                    <!--<small><s class="text-secondary">$1000</s></small>-->
                    <span class="price">$'. $productprice .'</span>
                </h5>

                <!--
                <h5>
                <input type="text" name="quantity" class="form-control" value="1" />  
                </h5>
                -->

                <button type="submit" class="btn btn-warning my-3"name="add">Add to cart <i class ="fas fa-shopping-cart"></i></button>
                <!-- <input type="hidden" name="product_id" value=. $productid .> -->
                <input type="hidden" name="product_id" data-value='. $productstock .'  value='. $productid .'>

                
            </div>
        </div>
    </form>
</div>
    ';
    echo $element;
}
}

function cartElement($productimg, $productname, $productprice, $productid, $productstock, $active){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\"></small>
                                <h5 class=\"pt-2\">$$productprice</h5>
                                
                               <!-- <input type=\"text\" name=\"quantity\" class=\"form-control\" value=\"1\" /> -->


                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}



//<button type=\"submit\" class=\"btn btn-warning\">Save</button>
/*
 <div class=\"col-md-3 py-5\">
                            <div>
                                <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                            </div>
                            </div>



                            <h6>
                <i class ="fas fa-star"></i>
                <i class ="fas fa-star"></i>
                <i class ="fas fa-star"></i>
                <i class ="fas fa-star"></i>
                <i class ="fas fa-star"></i>
                </h6>

*/