class Request {

	static endpoint = '/user'

	static all() {
		const url = BASE_URL.concat(Request.endpoint);
		return axios.get(url, { headers: HEADERS })
			.then((response) => {
				return response.data;
			}).catch((error) => {
				toastr.error(error.response.data.message);
				return error.response.data;
			});
	}

	static detail(id) {
		const url = BASE_URL.concat(Request.endpoint, '/', id)
		return axios.get(url, { headers: HEADERS })
			.then((response) => {
				return response.data;
			}).catch((error) => {
				toastr.error(error.response.data.message);
				return error.response.data;
			});
	}

	static create(data) {
		const url = BASE_URL.concat(Request.endpoint)
		return axios.post(url, data, { headers: HEADERS })
			.then((response) => {
				return response.data;
			}).catch((error) => {
				toastr.error(error.response.data.message);
				return error.response.data;
			});
	}

	static update(data) {
		const url = BASE_URL.concat(Request.endpoint, '/', data.id)
		return axios.post(url, data, { headers: HEADERS })
			.then((response) => {
				return response.data;
			}).catch((error) => {
				toastr.error(error.response.data.message);
				return error.response.data;
			});
	}

	static delete(id) {
		const url = BASE_URL.concat(Request.endpoint, '/', id)
		return axios.delete(url, { headers: HEADERS })
			.then((response) => {
				return response.data;
			}).catch((error) => {
				toastr.error(error.response.data.message);
				return error.response.data;
			});
	}

}