let perPage = 12;
let idPage = 1;
let start = 0;
let end = perPage;

const tops= [
    { id: 1, image: "images/product-items/product-tops12.jpg ", title: "DEGREY Ice Cream Shirt Pink" , price:"300.000 đ" ,priceroots :"420.000 đ" ,linkdetail:"detail1.html ", sale:"20%"},
    { id: 2, image: "images/product-items/product-tops02.jpg ", title: " DEGREY Paradise Orange", price:"400.000 đ",priceroots :"500.000 đ"  ,linkdetail:"detail1.html ", sale:"30%"},
    { id: 3, image: "images/product-items/product-tops03.jpg ", title: "DEGREY Paradise White", price:"400.000 đ",priceroots :"500.000 đ"  ,linkdetail:"detail1.html ", sale:"5%"},
    { id: 4, image: "images/product-items/product-tops19.jpg ", title: "DEGREY Paradise White", price:"300.000 đ",priceroots :"500.000 đ"  ,linkdetail:"detail1.html " , sale:"30%"},
    { id: 5, image: "images/product-items/product-tops05.jpg ", title: "DEGREY Paty", price:"500.000 đ",priceroots :"490.000 đ"  ,linkdetail:"detail1.html ", sale:"5%"},
    { id: 6, image: "images/product-items/product-tops06.jpg ", title: "DEGREY Buffterfly Blue", price:"300.000 đ",priceroots :"400.000 đ"  ,linkdetail:"detail1.html ", sale:"10%"},
    { id: 7, image: "images/product-items/product-tops07.jpg ", title: "DEGREY Buffterfly Pink", price:"300.000 đ",priceroots :"400.000 đ"  ,linkdetail:"detail1.html ", sale:"10%"},
    { id: 8, image: "images/product-items/product-tops18.jpg ", title: "DEGREY Sheeps Hoodie", price:"480.000 đ",priceroots :"400.000 đ"  ,linkdetail:"detail1.html ", sale:"20%"},
    { id: 9, image: "images/product-items/product-tops09.jpg ", title: "BOBUI DiamondGem Red", price:"500.000 đ",priceroots :"460.000 đ"  ,linkdetail:"detail1.html" , sale:"15%"},
    { id: 10, image: "images/product-items/product-tops10.jpg ", title: "BOBUI DiamondGem White", price:"500.000 đ",priceroots :"450.000 đ"  ,linkdetail:"detail1.html ", sale:"10%"},
    { id: 11, image: "images/product-items/product-tops11.jpg ", title: "DEGREY Ice Cream Shirt Blue", price:"500.000 đ",priceroots :"600.000 đ"  ,linkdetail:"detail1.html ", sale:"20%"},
  
 ]   


let productArr = [];
productArr = tops;



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
            html += '<div class="  top-sold-items"> ';
            html += '<div class="product-sale">';
            html += ' <span class="badge badge-pill badge-danger" style=" font-size: 1.3em;font-weight: bold; float:left; margin-top:6px;margin-left:5px ">-'+item.sale+'</span> ';
            html += '<img src=' + item.image + 'class="img-fluid img-top-sold">';
            html += ' </div> '
            html += '<div class="overlay">';
            html += '<a class="info" href='+item.linkdetail+'>Chi Tiết</a>';
            html += '</div>';
            html += '</div>';
            html += '<div class="top-sold-infor">'+item.title+ '<p style="margin-bottom: 1ex;">';
            html += '<b class="price " style="color: red"> '+item.price+'</b>';
            html += '<em  style="margin-left:2ex">Giá gốc: <span style="text-decoration: line-through;color: #aaa;font-size: 18px; ">'+item.priceroots+'</span></em>';
            html += '</p>';
            html += '<div class=" button">';
            html += '<button type="button" class="btn btn-outline-primary col-md-7 " style="float: left;"><a onclick="themgiohang()">Thêm Vào Giỏ Hàng</a> </button> ';
            html += '<button type="button" class="btn btn-outline-warning col-md-4 " style="float: right;"><a onclick="openCheckout()">Mua Ngay</a> </button> ';
            html += '</div> </div>';
            html += '</div> ';

            return html;
        }
    });
    document.getElementById('tops-sale').innerHTML = html;
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


