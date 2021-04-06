

const arrival = [
    { id: 1, image: "images/products/new-arrival01.jpg " , title: "Charlotte’s Web - E.B White" , price:"400.000 đ",detail:"detail3.html"},
    { id: 2, image: "images/products/new-arrival02.jpg ", title: "BoBUi", price:"400.000 đ" ,detail:"detail4.html"},
    { id: 3, image: "images/products/new-arrival04.jpg ", title: " The Outsiders", price:"400.000 đ" ,detail:"#"},
    { id: 4, image: "images/products/new-arrival03.jpg ", title: " DEGREY", price:"400.000 đ",detail:"detail5.html" },
 ]  

const bestseller = [
    { id: 1, image: "images/products/topsold01.jpg " , title: "Charlotte’s Web - E.B White" , price:"500.000 đ",detail:"detail.html"},
    { id: 2, image: "images/products/topsold02.jpg ", title: " BoBUi", price:"500.000 đ",detail:"detail2.html" },
    { id: 3, image: "images/products/topsold03.jpg ", title: "The Outsiders", price:"500.000 đ",detail:"#" },
    { id: 4, image: "images/products/topsold04.jpg ", title: " DEGREY", price:"500.000 đ",detail:"#" },
    { id: 5, image: "images/products/topsold05.jpg ", title: "The Outsiders", price:"500.000 đ",detail:"#" },
    { id: 6, image: "images/products/topsold06.jpg ", title: " DEGREY", price:"500.000 đ",detail:"#" },
    
    

 ]   







function renderProduct(arrival) {
    html = '';
    const content = arrival.map((item, index) => {
        
            html += '<div class="col-md-3 col-sm-12   text-center new-arrival-product">  ';
            html += '<div class="  new-arrival-items">';
            html += '<img src=' + item.image +  'class="img-fluid img-new-arrival">';
            html += '<div class="overlay">';
            html += '<a class="info" href='+item.detail+'>Chi Tiết</a>';
            html += '</div>';
            html += '</div>';
            html += '<div class="new-arrival-infor" style="float:left">'+item.title+ '<p>';
            html += '<b class="price " style="color: red; float:left"> '+item.price+'</b>';
            html += '</p>';
            html += '<button type="button" class="btn btn-outline-warning" onclick="openCheckout()" >Mua Ngay</button> ';          
            html += '</div> ';
            html += '</div> ';

            return html;
    });
    document.getElementById('arrival').innerHTML = html;
    /*highlightText();*/
}

renderProduct(arrival);

function renderBestseller(bestseller) {
    html = '';
    const content = bestseller.map((item, index) => {
        
             html += '<div class="col-md-4 col-sm-12 text-center top-sold-product">';
            html += '<div class="  top-sold-items">';
            html += '<img src=' + item.image + 'class="img-fluid img-top-sold">';
            html += '<div class="overlay">';
            html += '<a class="info" href='+item.detail+'>Chi Tiết</a>';
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
    });
    document.getElementById('bestseller').innerHTML = html;

}
renderBestseller(bestseller);