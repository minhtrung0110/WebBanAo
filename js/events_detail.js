function adjustQuanlity(obj){
	var op=obj.value;
	var txQuanlity=document.getElementById("txQuanlity_detail");
	if(op=='+')
		txQuanlity.value++;
	else
		txQuanlity.value--;
}