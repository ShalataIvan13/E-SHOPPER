<footer id="footer">
    <div class="footer-bottom">
        <div class="container">
            <div class="row mr">
                <p class="pull-left">Copyright © 2021</p>
                <p class="pull-right">First project PHP</p>
            </div>
        </div>
    </div>
</footer>

<style>

    footer {
        margin-top: 290px;
    }

    footer .row {
        display: flex;
        align-items: center;
        height: 40px;
        background-color: whitesmoke;
    }

    .footer-bottom {
        background-color: whitesmoke;
    }

    footer .container {
        margin-left: 80px;
        padding-left: 20px;
        padding-right: 30px;
    }

    .mr .pull-right {
        padding-left: 900px;
    }

</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="template/js/jquery.cycle2.carousel.js"></script>
<script src="template/js/jquery.cycle2.js"></script>

<script src="template/js/jquery.js"></script>
<script src="template/js/bootstrap.min.js"></script>
<script src="template/js/jquery.scrollUp.min.js"></script>
<script src="template/js/price-range.js"></script>
<script src="template/js/jquery.prettyPhoto.js"></script>
<script src="template/js/main.js"></script>
<script>
    $(document).ready(function() {
        $(".add-to-cart").click(function() {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            // location.reload(true);
            return false;
        })
    })
</script>
