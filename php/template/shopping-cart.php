<!-- Shopping cart section  -->
<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
                <!-- cart item -->
            <?php
            $total=0.0;
            foreach($product->getData('cart',$_SESSION['user_id']) as $item) {
                $cart=array();
                $cart =$product->getProduct($item['item_id']);
                foreach($cart as $section) {
                $total+=$section['item_price']*$item['quant'];
                ?> 
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo '../'.$section['item_image']; ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $section['item_name']; ?></h5>
                        <small>by <?php echo $section['item_brand']; ?></small>
                        

                        <!-- product qty -->
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-rale w-25">
                                
                                <!-- <input type="number" name="qte" data-id="<?php echo $section['item_id']; ?>" class="qty_input border px-2 w-50 bg-light"
                                    value="<?php echo $section['quant']; ?>" placeholder="1" min="1"> -->
                                    <form method="post">
                                        <button name="increment">+</button>
                                        <input type="hidden" name="item_id" value="<?php echo $section['item_id'];?>"> 
                                        <input name="quantity" value="<?php echo $item['quant']; ?>" />
                                        <button name="decrement">-</button>
                                    </form>
                            </div>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $section['item_id'];?>">
                            <button type="submit" name="delete_cart" class="btn font-baloo text-danger px-3 border-right">Delete</button>

                        </form>
                        </div>
                </div>
                        <!-- !product qty -->

                    

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            <?php
                                $prix=$section['item_price']*$item['quant'];
                            ?>
                            <span class="product_price" data-id="<?php echo $section['item_id']; ?>"><?php echo $prix; ?>TND</span>
                        </div>
                    </div>
                </div>
                <!-- !cart item -->
                <?php }
                }?>
            </div>
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is
                        eligible for FREE Delivery.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal (<?php echo count($product->getData('cart')); ?> item):&nbsp; <span
                                    class="text-danger " id="deal-price"><?php echo $total;?>TND</span> </span> </h5>
                        <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
    </div>
</section>
