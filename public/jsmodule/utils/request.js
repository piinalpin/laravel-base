class Request {

	static all(endpoint) {
		const url = BASE_URL.concat(endpoint);
		return axios.get(url, { headers: HEADERS })
			.then((response) => {
				return response.data;
			}).catch((error) => {
				toastr.error(error.response.data.message);
				return;
			});
	}

	static detail(endpoint, id) {
		const url = BASE_URL.concat(endpoint, '/', id)
		return axios.get(url, { headers: HEADERS })
			.then((response) => {
				return response.data;
			}).catch((error) => {
				toastr.error(error.response.data.message);
				return;
			});
	}

	static create(endpoint, data) {
		const url = BASE_URL.concat(endpoint)
		return axios.post(url, data, { headers: HEADERS })
			.then((response) => {
				return response.data;
			}).catch((error) => {
				toastr.error(error.response.data.message);
				return;
			});
	}

	static update(endpoint, data) {
		const url = BASE_URL.concat(endpoint, '/', data.id)
		return axios.post(url, data, { headers: HEADERS })
			.then((response) => {
				return response.data;
			}).catch((error) => {
				toastr.error(error.response.data.message);
				return;
			});
	}

	static delete(endpoint, id) {
		const url = BASE_URL.concat(endpoint, '/', id)
		return axios.delete(url, { headers: HEADERS })
			.then((response) => {
				return response.data;
			}).catch((error) => {
				toastr.error(error.response.data.message);
				return;
			});
	}

}