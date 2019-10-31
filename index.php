<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="stylesheet" href="carousel/owl.carousel.css">
    <link rel="stylesheet" href="carousel/owl.theme.default.css">

    <link rel="stylesheet" href="css/card_hover.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="img/logo2.png" />
    <title>ShopShoe-Trang Chủ</title>
</head>
<body>
<?php
//Khai báo sử dụng session
session_start();
 
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
 
//Xử lý đăng nhập
if (isset($_POST['dangnhap'])) 
{
    //Kết nối tới database
    include('PHP/ketnoi.php');
     
    //Lấy dữ liệu nhập vào
    $username = $_POST['txtUsername'];
    $password = $_POST['txtPassword'];
     
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    //Kiểm tra tên đăng nhập có tồn tại không
    $sql = "SELECT user, pass FROM user WHERE user='$username'";
    if (mysqli_query($conn,$sql) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    //Lấy mật khẩu trong database ra
     $sql = "SELECT user, pass FROM user WHERE pass='$password'";
    //So sánh 2 mật khẩu có trùng khớp hay không
    if (mysqli_query($conn,$sql) == 0) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    //Lưu tên đăng nhập
    $_SESSION['username'] = $username;
    echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công. <a href='/'>Về trang chủ</a>";
    die();
}
?>
    <div id="header">
        <div id="a">

            <div id="header_2">
                <div class="row" id="header_21">
                    <div class="col-4" id="header_21a">
                        <a href="index.html"><img src="img/logo2.png" alt=""></a>
                    </div>

                    <div class="col-4" id="header_21b">
                        <ul>
                            <li><a href="html/men.html">Giày Nam</a></li>
                            <li><a href="html/women.html">Giày Nữ</a></li>
                            <li><a href="html/sale.html">Khuyến Mãi</a></li>
                        </ul>
                        
                    </div>

                    <div class="col-4" id="header_21c">
                        <ul>
                            <li>
                                <form action="" id="search">
                                    <input type="text" placeholder="Tìm Kiếm">
                                    <span class="fas fa-search"></span>
                                </form>
                            </li>
						
<?php 
       if (isset($_SESSION['username']) && $_SESSION['username']){
           echo '<li>Chào '.$_SESSION['username'].'</li>';
           echo '<li><a href="logout.php">Logout</a></li>';
       }
       else{
           echo '<li><i onclick="login()" class="fas fa-user"></i></li>
		   <li> <a href="html/cart.html"> <i class="fas fa-shopping-bag"></i></a></li>';
       }
       ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="header_3">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <h6>Chúng tôi đưa đến cho bạn những gì ?</h5>
                                <p>Những đôi giày hàng hiệu , đẹp lạ về kiểu dáng, chất lượng về sản phẩm, an tâm về túi tiền.</p>
                        </div>
                        <div class="carousel-item">
                            <h6>Tại sao bạn phải đến với chúng tôi ?</h6>
                            <p>Tiêu chí của chúng tôi là khách hàng là thượng đế, uy tín được đặt lên hàng đầu ,luôn luôn lắng nghe luôn luôn thấu hiểu.</p>
                        </div>
                        <div class="carousel-item">
                            <h6>Tại sao bạn phải tin tưởng về chúng tôi?</h6>
                            <p>Qua 6 năm hoạt động và phát triển ShopShoe chưa để 1 khách hàng nào có ấn tượng xấu về chúng tôi.</p>
                        </div>
                    </div>

                </div>
            </div>

            <div id="header_4">
                <div id="banner">
                    <img src="img/banner (1).jpg" alt="">
                </div>
            </div>
        </div>



        <!-- Responsive Header -->

        <div id="b">
            <div id="b_1">
                <div id="b_1_1">
                    <p>Liên Hệ Ngay: <a href=""> 0978032402</a></p>
                </div>
            </div>


            <div id="header_responsive">
                <nav class="navbar navbar-light" id="b_2">
                    <div class="navbar-brand" id="b_2_1">
                        <input type="checkbox" id="menuToggle">
                        <label for="menuToggle" class="menu-icon"><i class="fas fa-bars"></i></label>

                        <div class="menu">
                            <ul>


                                <a href="html/men.html">
                                    <li>Giày Nam</li>
                                </a>

                                <a href="html/women.html">
                                    <li>Giày Nữ</li>
                                </a>

                                <a href="html/sale.html">
                                    <li>Khuyến Mãi</li>
                                </a>
                                <div id="ul_1">
                                    <a href="#">
                                        <li onclick="login()"><i class="fas fa-user"> Đăng Nhập</i></li>
                                    </a>
                                    <a href="html/infor_shop.html">
                                        <li>Thông tin Shop</li>
                                    </a>

                                    <a href="html/news.html">
                                        <li>Bài Viết</li>
                                    </a>

                                    <a href="html/call.html">
                                        <li>Liên Hệ</li>
                                    </a>
                                </div>


                            </ul>
                        </div>
                    </div>


                    <div id="b_2_2">
                        <button onclick="search_responsive()"><span class="fas fa-search"></span></button>
                        <a href="html/cart.html"> <button><span class="fas fa-shopping-bag"></span></button></a>

                    </div>

                </nav>



                <div id="logo_responsive">
                    <a href="index.html"><img src="img/logo2.png" alt=""></a>
                </div>


                <div id="input_search">
                    <form action="">
                        <input type="text" placeholder="Tìm Kiếm">
                        <span class="fas fa-search"></span>
                    </form>
                </div>



            </div>

            <div id="b_3">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <h6>Chúng tôi đưa đến cho bạn những gì ?</h5>
                                <p>Những đôi giày hàng hiệu , đẹp lạ về kiểu dáng, chất lượng về sản phẩm, an tâm về túi tiền.</p>
                        </div>
                        <div class="carousel-item">
                            <h6>Tại sao bạn phải đến với chúng tôi ?</h6>
                            <p>Tiêu chí của chúng tôi là khách hàng là thượng đế, uy tín được đặt lên hàng đầu ,luôn luôn lắng nghe luôn luôn thấu hiểu.</p>
                        </div>
                        <div class="carousel-item">
                            <h6>Tại sao bạn phải tin tưởng về chúng tôi?</h6>
                            <p>Qua 6 năm hoạt động và phát triển ShopShoe chưa để 1 khách hàng nào có ấn tượng xấu về chúng tôi.</p>
                        </div>
                    </div>

                </div>
            </div>

            <div id="b_4">
                <div id="banner">
                    <img src="img/banner (1).jpg" alt="">
                </div>
            </div>



        </div>




        <!--  -->




    </div>

    <div class="login-page" id="login-page">
        <div class="form">
            <form action="Php/xuly.php" class="register-form form_1" method="POST">
                <input type="text" placeholder="Tên" name="txtUsername">
                <input type="text" placeholder="Email" name="txtEmail">
                <input type="text" placeholder="Mật Khẩu" name="txtPassword">
                <input type="text" placeholder="Địa Chỉ" name="txtAdress">
                <button type="submit" value="Đăng ký">Đăng Kí</button>

                <p class="message"><a href="#">Đăng Nhập</a></p>
            </form>

            <form action="index.php?do=login" class="login-form form_1" method="POST">
                <input type="text" placeholder="Email" name='txtUsername'>
                <input type="text" placeholder="Password" name='txtPassword'>
                <button input type="submit" name="dangnhap" value='Đăng nhập'>Đăng Nhập</button>
                <p class="message">Quên Mật Khẩu<br><a href="#">Đăng Kí</a></p>
            </form>

            <span class="fas fa-times" id="close" onclick="off()"></span>
        </div>


    </div>


    <div id="fullscreen" onclick="off()"></div>



    <div id="main" class="main">
        <div id="main_1" class="container">
            <h3>Sản Phẩm Mới</h3>
            <div id="newitem" class="row">

            </div>
        </div>

        <div id="main_2" class="row">
            <div id="men-sneaker" class="sneaker col-md-6">
                <div id="hover-img">
                    <img src="img/men-sneaker.jpg" alt="">
                    <a href="html/men.html"><button>Giày Nam</button></a>
                </div>

            </div>
            <div id="women-sneaker" class="sneaker col-md-6">
                <div id="hover-img">
                    <img src="img/women-sneaker.jpg" alt="">
                    <a href="html/women.html"><button>Giày Nữ</button></a>
                </div>

            </div>
        </div>

        <div id="main_3" class="container">
            <h3>Sản Phẩm Bán Chạy</h3>
            <div id="hotitem" class="row">

            </div>
        </div>

        <div id="main_4">
            <h3>Chia Sẻ Của Khách Hàng</h3>
            <br>
            <div class="container">
                <div class="row">
                    <div class="owl-carousel owl-theme" id="main_4_1">


                    </div>
                </div>
            </div>
        </div>



        <div id="main_5" class="container">
            <h3>Tin Tức Mới</h3>
            <br>
            <div class="container">
                <div class="row">
                    <div class="owl-carousel owl-theme" id="main_5_1">


                    </div>
                </div>
            </div>
        </div>



        <div id="main_6">
            <div id="main_6_1a"></div>
            <div id="main_6_1">
                <p>Liên Hệ Cửa hàng</p>
                <a href="html/call.html"><button>Xem Ngay</button></a>
            </div>
        </div>


        <div id="main_6">
            <div id="main_6_1a"></div>
            <div id="main_6_1">
                <p>Thông tin Shop</p>
                <a href="html/infor_shop.html"><button>Xem Ngay</button></a>
            </div>
        </div>
        <div id="main_6">
            <div id="main_6_1a"></div>
            <div id="main_6_1">
                <p>Bài viết</p>
                <a href="html/news.html"><button>Xem Ngay</button></a>
            </div>
        </div>

    </div>




    <!--Xem Chi Tiết sản phẩm  -->

    <!-- Modal -->
    <div id="modal">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chi Tiết Sản Phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="../img/sản phẩm 5.jpg" alt="">
                            </div>
                            <div class="col-sm-6">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </p>

                                <span>Chọn Size</span><br>
                                <select name="" id="" style="margin-bottom:12px">

                                    <option value="" selected disabled>Chọn Size</option>
                                    <option value="price_up">36</option>
                                    <option value="price_down">37</option>
                                    <option value="price_up">38</option>
                                    <option value="price_down">39</option>
                                    <option value="price_up">40</option>
                                    <option value="price_down">41</option>
                                    <option value="price_up">42</option>

                                </select>
                                <br>

                                <span>Chọn Số Lượng</span><br>
                                <input type="number" value="1" min="1" style="max-width:150px;margin-bottom:12px">

                                <button id="btn2">Thêm Vào Giỏ</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--  -->





    <div id="footer">
        <div id="footer_1" class="row">
            <h3 class="col-md-6">Đăng Kí Để Nhận Khuyến Mãi</h3>
            <div id="input" class="ml-auto col-md-6">
                <form action="">
                    <input type="text" placeholder="Nhập Email Của Bạn">
                    <a href="#" class="fas fa-paper-plane"></a>
                </form>
            </div>
        </div>

        <div id="footer_2" class="container">
            <div class="row">
                <div class="col-md-4">

                    <ul>
                        <li>Liên Hệ</li>
                        <li>SĐT: 096448899</a></li>
                        <li> <span>Store 1</span> 144, Xuân Thuỷ, Cầu Giấy, Hà Nội</li>

                        <li> <span>Store 2</span> 1, Phạm Văn Đồng, Cầu Giấy, Hà Nội</li>

                        <li> <span>Store 3</span> 336, Nguyễn Trãi, Thanh Xuân, Hà Nội</li>

                        <li> <span>Store 4</span> 22, Mỹ Đình, Nam Từ Liêm, Hà Nội</li>

                        <li> <span>Store 5</span> 1160, Láng , Đống Đa, Hà Nội</li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul>
                        <li>ĐẶT HÀNG </li>
                        <li>Đặt hàng thế nào ?</li>
                        <li>Thông tin giao hàng </li>
                        <li>Trả lại và trao đổi</li>
                    </ul>
                </div>

                <div class="col-md-2">
                    <ul>
                        <li>HỖ TRỢ </li>
                        <li>7 cách bảo quản giày thể thao tốt nhất</li>
                        <li>Giữ “phong độ” cho Sneaker trắng ra sao</li>
                        <li>9 kỹ thuật làm đẹp dành cho U30</li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous"
                        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3"></script>

                    <div class="fb-page"
                        data-href="https://www.facebook.com/DemoProject-2585801611438970/?modal=admin_todo_tour"
                        data-tabs="timeline" data-width="" data-height="300" data-small-header="false"
                        data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/DemoProject-2585801611438970/?modal=admin_todo_tour"
                            class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/DemoProject-2585801611438970/?modal=admin_todo_tour">DemoProject</a>
                        </blockquote>
                    </div>
                </div>
            </div>

        </div>

        <div id="footer_3">
            <div id="internet">
                <a href="#" class="fab fa-facebook-square"></a>
                <a href="#" class="fab fa-twitter-square"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-youtube-square"></a>
            </div>
            <p>Copyright 2019 <i class="far fa-copyright"></i> Designed by Nhom7</p>

        </div>
    </div>



    <div id="backtotop">
        <a href="#header"><span class="fas fa-caret-up"></span></a>
    </div>






    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    

    <!-- Your customer chat code -->
    <div class="fb-customerchat" attribution=install_email page_id="2585801611438970" logged_in_greeting="Xin Chào !!!"
        logged_out_greeting="Xin Chào !!!">
    </div>








    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src='https://code.jquery.com/jquery-3.4.1.min.js
    '> </script>
    <script src="js/header_footer.js"></script>
    <script src="carousel/owl.carousel.js"></script>

    <script src="js/home.js"></script>
</body>
</body>

</html>
