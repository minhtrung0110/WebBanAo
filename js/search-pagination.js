let perPage = 12;
let idPage = 1;
let start = 0;
let end = perPage;

const product = [
    { id: 1, image: "images/product-items/product-tops01.jpg ", title: " DEGREY Paradise Black" , price:"290.000 đ",linkdetail:"detail.html "},
    { id: 2, image: "images/product-items/product-tops02.jpg ", title: " DEGREY Paradise Orange", price:"290.000 đ" ,linkdetail:"detail1.html "},
    { id: 3, image: "images/product-items/product-tops03.jpg ", title: " DEGREY Paradise White", price:"290.000 đ" ,linkdetail:"detail2.html "},
    { id: 4, image: "images/product-items/product-tops19.jpg ", title: " DEGREY Buffterfly Purple", price:"290.000 đ" ,linkdetail:"detail3.html " },
    { id: 5, image: "images/product-items/product-tops05.jpg ", title: " DEGREY Paty", price:"290.000 đ" ,linkdetail:"detail4.html "},
    { id: 6, image: "images/product-items/product-tops06.jpg ", title: " DEGREY Buffterfly Blue ", price:"290.000 đ" ,linkdetail:"detail5.html "},
    { id: 7, image: "images/product-items/product-tops07.jpg ", title: " DEGREY Buffterfly Pink", price:"290.000 đ" ,linkdetail:"detail6.html "},
    { id: 8, image: "images/product-items/product-tops09.jpg ", title: " BOBUI DiamondGem Red", price:"350.000 đ" ,linkdetail:"detail7.html "},
    { id: 9, image: "images/product-items/product-tops10.jpg ", title: " BOBUI DiamondGem White", price:"350.000 đ" ,linkdetail:"detail8.html" },
    { id: 10, image: "images/product-items/product-tops11.jpg ", title: " DEGREY Ice Cream Shirt Blue" , price:"320.000 đ",linkdetail:"detail9.html "},
    { id: 11, image: "images/product-items/product-tops12.jpg ", title: " DEGREY Ice Cream Shirt Pink", price:"320.000 đ" ,linkdetail:"detail10.html"},
    { id: 12, image: "images/product-items/product-tops13.jpg ", title: " DEGREY Ice Cream Shirt Purple", price:"320.000 đ" ,linkdetail:"detail11.html"},
    { id: 13, image: "images/product-items/product-tops14.jpg ", title: " BOBUI Essential BabyBlue", price:"350.000 đ" ,linkdetail:"detail12.html"},
    { id: 14, image: "images/product-items/product-tops15.jpg ", title: " BOBUI Essential Orange", price:"350.000 đ" ,linkdetail:"detail13.html"},
    { id: 15, image: "images/product-items/product-tops16.jpg ", title: " BOBUI Essential BabyPink", price:"350.000 đ" ,linkdetail:"detail14.html"},
    { id: 16, image: "images/product-items/product-tops04.jpg ", title: " DEGREY Candy Cake", price:"400.000 đ" ,linkdetail:"detail15.html"},
    { id: 17, image: "images/product-items/product-tops18.jpg ", title: " DEGREY Sheeps Hoodie ", price:"400.000 đ",linkdetail:"detail16.html" },
    { id: 18, image: "images/product-items/product-tops19.jpg ", title: " DEGREY Hoodie Sun Flower", price:"410.000 đ" ,linkdetail:"detail17.html"},
    { id: 19, image: "images/product-items/product-bottoms01.jpg ", title: "Trendy Jeans" , price:"550.000 đ",linkdetail:"detail1.html "},
    { id: 20, image: "images/product-items/product-bottoms04.jpg ", title: "Stretch Jeans", price:"350.000 đ" ,linkdetail:"detail1.html "},
    { id: 21, image: "images/product-items/product-bottoms03.jpg ", title: "Hitup Jeans", price:"400.000 đ" ,linkdetail:"detail1.html "},
   { id: 22, image: "images/product-items/product-bottoms04-c.jpg ", title: "Stressed Jeans", price:"420.000 đ" ,linkdetail:"detail1.html " },
   { id: 23, image: "images/product-items/product-accessories01.jpg ", title: "BasicCap" , price:"190.000 đ",linkdetail:"detail1.html "},
   { id: 24, image: "images/product-items/product-accessories08.jpg ", title: "Degrey Galaxy Backpack", price:"280.000 đ" ,linkdetail:"detail1.html "},
   { id: 25, image: "images/product-items/product-accessories03.jpg ", title: "Degrey Butterfly BlueBag", price:"390.000 đ" ,linkdetail:"detail1.html "},
   { id: 26, image: "images/product-items/product-accessories04.jpg ", title: "Degrey Butterfly PinkBag", price:"390.000 đ" ,linkdetail:"detail1.html " },
   { id: 27, image: "images/product-items/product-accessories06.jpg ", title: "Degrey CandyCake Bag", price:"390.000 đ" ,linkdetail:"detail1.html "},
   { id: 28, image: "images/product-items/product-accessories07.jpg ", title: "Degrey season 5 Bag", price:"410.000 đ" ,linkdetail:"detail1.html "},
   { id: 29, image: "images/product-items/product-accessories02.jpg ", title: "BucketHat", price:"430.000 đ" ,linkdetail:"detail1.html "},
]  

let productArr = [];

function Search()// Xem lai cho nay
{
    var search=document.getElementById('search-product').value;
    var check =product.indexOf(search,0);
    if(check==-1)
    alert("Không Tìm Thấy Sản Phẩm Có Tên Như Vậy")
   
       
}
productArr = product;



let totalPages = Math.ceil(productArr.length / perPage);


function initRender(productAr, totalPage) {
    renderProduct(productAr);
    renderListPage(totalPage);
}

initRender(productArr, totalPages);

function getCurrentPage(indexPage) {
    start = (indexPage - 1) * perPage;
    end = indexPage * perPage;
    totalPages = Math.ceil(productArr.length / perPage);
   
}



getCurrentPage(1);



function renderProduct(product) {
    html = '';
    const content = product.map((item, index) => {
        if (index >= start && index < end) {
            html += '<div class="col-md-4 col-sm-12 text-center top-sold-product">';
            html += '<div class="  top-sold-items">';
            html += '<img src=' + item.image + 'class="img-fluid img-top-sold" style="height:330px">';
            html += '<div class="overlay">';
            html += '<a class="info" href='+item.linkdetail+'>Chi Tiết</a>';
            html += '</div>';
            html += '</div>';
            html += '<div class="top-sold-infor">'+item.title+ '<p style="margin-bottom: 1ex;">';
            html += '<b class="price " style="color: red"> '+item.price+'</b>';
            html += '</p>';
            html += '<div class=" button">';
            html += '<button type="button" class="btn btn-outline-primary col-md-7 " style="float: left;"><a onclick="themgiohang()">Thêm Vào Giỏ Hàng</a> </button> ';
            html += '<button type="button" class="btn btn-outline-warning col-md-4 " style="float: right;"><a href="checkout.html">Mua Ngay</a> </button> ';
            html += '</div> </div>';
            html += '</div> ';

            return html;
        }
    });
    document.getElementById('search-result').innerHTML = html;
    /*highlightText();*/
}

function renderListPage(totalPages) {
    let html = '';
    html += `<li class="current-page active"><a>${1}</a></li>`;
    for (let i = 2; i <= totalPages; i++) {
        html += `<li><a>${i}</a></li>`;
    }
    if (totalPages === 0) {
        html = ''
    }
    document.getElementById('number-page').innerHTML = html;
}

function changePage() {
    const idPages = document.querySelectorAll('.number-page li');
    const a = document.querySelectorAll('.number-page li a');
    for (let i = 0; i < idPages.length; i++) {
        idPages[i].onclick = function () {
            let value = i + 1;
            const current = document.getElementsByClassName('active');
            current[0].className = current[0].className.replace('active', '');
            this.classList.add('active');
            if (value > 1 && value < idPages.length) {
                $('.btn-prev').removeClass('btn-active');
                $('.btn-next').removeClass('btn-active');
            }
            if (value == 1) {
                $('.btn-prev').addClass('btn-active');
                $('.btn-next').removeClass('btn-active');
            }
            if (value == idPages.length) {
                $('.btn-next').addClass('btn-active');
                $('.btn-prev').removeClass('btn-active');
            }
            idPage = value;
            getCurrentPage(idPage);
            renderProduct(productArr);
        };
    }
}

changePage();

$('.btn-next').on('click', () => {
    idPage++;
    if (idPage > totalPages) {
        idPage = totalPages;
    }
    if (idPage == totalPages) {
        $('.btn-next').addClass('btn-active');
    } else {
        $('.btn-next').removeClass('btn-active');
    }
    console.log(idPage);
    const btnPrev = document.querySelector('.btn-prev');
    btnPrev.classList.remove('btn-active');
    $('.number-page li').removeClass('active');
    $(`.number-page li:eq(${idPage - 1})`).addClass('active');
    getCurrentPage(idPage);
    renderProduct(productArr);
});

$('.btn-prev').on('click', () => {
    idPage--;
    if (idPage <= 0) {
        idPage = 1;
    }
    if (idPage == 1) {
        $('.btn-prev').addClass('btn-active');
    } else {
        $('.btn-prev').removeClass('btn-active');
    }
    const btnNext = document.querySelector('.btn-next');
    btnNext.classList.remove('btn-active');
    $('.number-page li').removeClass('active');
    $(`.number-page li:eq(${idPage - 1})`).addClass('active');
    getCurrentPage(idPage);
    renderProduct(productArr);
});


