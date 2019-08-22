
	var _e_sel_parent = document.getElementsByName("sel_idparent")[0];
	var _e_option_parent = _e_sel_parent.getElementsByTagName("option");
	for (var i =  _e_option_parent.length - 1; i >= 0; i--) {
		if( _e_option_parent[i].value==selected_idparent){
			_e_option_parent[i].setAttribute("selected", true);
		}
	}

	var _e_sel_cattype = document.getElementsByName("sel_idcattype")[0];
	var _e_option_cattype = _e_sel_cattype.getElementsByTagName("option");
	for (var i = _e_option_cattype.length - 1; i >= 0; i--) {
		if(_e_option_cattype[i].value==selected_idcattype){
			_e_option_cattype[i].setAttribute("selected", true);
		}
	}
