let perPage = 12;
let idPage = 1;
let start = 0;
let end = perPage;

const bottoms = [
    { id: 1, image: "images/product-items/product01.jpg ", title: "1: Charlotte’s Web - E.B White" , price:"500.000 đ"},
    { id: 2, image: "images/product-items/product02.jpg ", title: "2: BoBUi", price:"500.000 đ" },
    { id: 3, image: "images/product-items/product03.jpg ", title: "3: The Outsiders", price:"500.000 đ" },
    { id: 4, image: "images/product-items/product04.jpg ", title: "4: DEGREY", price:"500.000 đ" },
    { id: 5, image: "images/product-items/product05.jpg ", title: "5: Thirteen Reasons Why", price:"500.000 đ" },
    { id: 6, image: "images/product-items/product06.jpg ", title: "6: Peter Pan", price:"500.000 đ" },
    { id: 7, image: "images/product-items/product07.jpg ", title: "7: URBANMONKEY", price:"500.000 đ" },
    { id: 8, image: "images/product-items/product08.jpg ", title: "8: Ernest Hemmingway", price:"500.000 đ" },
]
 const tops  = [
    { id: 1, image: "images/product-items/product01.jpg ", title: "1: Charlotte’s Web - E.B White" , price:"500.000 đ"},
    { id: 2, image: "images/product-items/product02.jpg ", title: "2: BoBUi", price:"500.000 đ" },
    { id: 3, image: "images/product-items/product03.jpg ", title: "3: The Outsiders", price:"500.000 đ" },
    { id: 4, image: "images/product-items/product04.jpg ", title: "4: DEGREY", price:"500.000 đ" },
    { id: 5, image: "images/product-items/product05.jpg ", title: "5: Thirteen Reasons Why", price:"500.000 đ" },
    { id: 6, image: "images/product-items/product06.jpg ", title: "6: Peter Pan", price:"500.000 đ" },
    { id: 7, image: "images/product-items/product07.jpg ", title: "7: URBANMONKEY", price:"500.000 đ" },
    { id: 8, image: "images/product-items/product08.jpg ", title: "8: Ernest Hemmingway", price:"500.000 đ" },
    { id: 9, image: "images/product-items/product09.jpg ", title: "9: The Giver - Lois Lowry", price:"500.000 đ" },
    { id: 10, image: "images/product-items/product10.jpg ", title: "1: Charlotte’s Web - E.B White" , price:"500.000 đ"},
    { id: 11, image: "images/product-items/product11.jpg ", title: "2: BoBUi", price:"500.000 đ" },
    { id: 12, image: "images/product-items/product12.jpg ", title: "3: The Outsiders", price:"500.000 đ" },
    { id: 13, image: "images/product-items/product13.jpg ", title: "4: DEGREY", price:"500.000 đ" },
    { id: 14, image: "images/product-items/product14.jpg ", title: "5: Thirteen Reasons Why", price:"500.000 đ" },
    { id: 15, image: "images/product-items/product15.jpg ", title: "6: Peter Pan", price:"500.000 đ" },
    { id: 16, image: "images/product-items/product16.jpg ", title: "7: URBANMONKEY", price:"500.000 đ" },
    { id: 17, image: "images/product-items/product17.jpg ", title: "8: Ernest Hemmingway", price:"500.000 đ" },
    { id: 18, image: "images/product-items/product18.jpg ", title: "9: The Giver - Lois Lowry", price:"500.000 đ" },
 ]  
var productArr = [];
productArr=tops
/*var check=0;

// chuyen doi ham add nay thanh tham bien la se dc

    //productArr = tops;
function open(){
    return 1;
}
check=open;

$('.ao').on('click', () => {
    productArr=tops;
});
$('.quan').on('click', () => {
    check=2;
});

console.log(check);

if(check==1) productArr=tops;
if(check==2) productArr=bottoms
*/

let totalPages = Math.ceil(productArr.length / perPage);


function initRender(productAr, totalPage) {
    renderProduct(productAr);
    renderListPage(totalPage);
}
initRender(productArr, totalPages);
function active(){
    return -1;
}
/*function activebottoms(){
    add(bottoms)
    initRender(productArr, totalPages);
}*/

function getCurrentPage(indexPage) {
    start = (indexPage - 1) * perPage;
    end = indexPage * perPage;
    totalPages = Math.ceil(productArr.length / perPage);
   
}



getCurrentPage(1);



function renderProduct(items) {
    html = '';
    const content = items.map((item, index) => {
        if (index >= start && index < end) {
            html += '<div class="col-md-4 col-sm-12 text-center top-sold-product">';
            html += '<div class="  top-sold-items">';
            html += '<img src=' + item.image + 'class="img-fluid img-top-sold">';
            html += '<div class="overlay">';
            html += '<a class="info" href="product.html">Chi Tiết</a>';
            html += '</div>';
            html += '</div>';
            html += '<div class="top-sold-infor">'+item.title+ '<p style="margin-bottom: 1ex;">';
            html += '<b class="price " style="color: red"> '+item.price+'</b>';
            html += '</p>';
            html += '<div class=" button">';
            html += '<button type="button" class="btn btn-outline-primary col-md-7 " style="float: left;"><a href="">Thêm Vào Giỏ Hàng</a> </button> ';
            html += '<button type="button" class="btn btn-outline-warning col-md-4 " style="float: right;"><a href="">Mua Ngay</a> </button> ';
            html += '</div> </div>';
            html += '</div> ';

            return html;
        }
    });
    document.getElementById('product').innerHTML = html;
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
            renderProduct(tops);
        };
    }
}

changePage();// doi so trang

// dieu huong
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


