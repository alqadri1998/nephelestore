"use strict";

var Commander = function() {
	var sendAjaxRequest = function(url, method = 'get', data = {}) {
		var returnedData = {};
		$.ajax({
			url: url,
			type: method,
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			data: data,
			async: false,
			success: (response) => {
				returnedData = {
					'status' 	: 'success',
					'response' 	: response
				};
			},
			error: (xhr, ajaxOptions, thrownError) => {
				returnedData = {
					'status' 	: 'error',
					'response' 	: thrownError
				};
			}
		});
		return returnedData;
	}
	return {
		ajax: function(url, method = 'get', data = {}) {
			return sendAjaxRequest(url, method, data);
		}
	};
}();