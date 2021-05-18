<div class="ui modal ">
    <div class="header">Your cart: <?= $_SESSION['cart'] ?> Item</div>
    <div class="scrolling content">
        <?php if(count($items) == 0) {
            echo "Your cart is empty";
            $total = 0;

        }else{
            $total = 0;
            foreach($items as $item ){?>
            <?php $total += $item['Harga'];?>
            <div class="ui grid">
                <div class="four wide mobile two wide computer column">
                    <div class="ui fluid rounded image">
                        <img id="poster" src="<?= base_url('assets/uploads/poster/'.$item['Gambar']) ?>">
                    </div>
                </div>
                <div class="eight wide mobile eight wide tablet twelve wide computer column">
                    <h5><?= $item['Nama_Barang'] ?></h5>
                    <p>IDR <?= number_format($item['Harga']) ?></p>
                </div>
                <div class="four wide mobile four wide tablet two wide computer column middle aligned content">
                    <a href="<?= base_url('index.php/customer/deleteCart/'.$item['Id'])?>" class="ui icon red button" data-tooltip="Remove from cart" data-position="left center">
                        <i class="trash icon"></i>
                    </a>
                </div>
            </div>
            <div class="ui divider"></div>
            <?php }?>
        <?php }?>
    </div>
    <div class="actions">
        <div class="ui grid left aligned">
            <div class="eight wide column">
                <div class="ui labeled input">
                    <div class="ui label">
                    IDR <span id=""><?= number_format($total) ?></span>  ×
                    </div>
                    <input type="number" value="" id="hari" oninput="calculateTotal(<?= $total?>)" placeholder="day">
                    <div class="ui label" id="equal">= IDR 0</div>
                </div>
            </div>
            <div class="eight wide column right aligned">
                <a href="#" id="checkoutBtn" class="ui green button disabled">Checkout</a>
            </div>
        </div>
    </div>
</div>
<?php //if($total == 0) echo "disabled"; ?>
<script>
    function calculateTotal(total){
        var hari = document.getElementById('hari').value;
        var hasil = (total*hari).toLocaleString();
        document.getElementById('equal').innerHTML = "= IDR "+ hasil;
        var checkout = document.getElementById('checkoutBtn');
        if(hari!=0){
            checkout.classList.remove('disabled')
        }else{
            checkout.classList.add('disabled')
        }
    }
</script>
