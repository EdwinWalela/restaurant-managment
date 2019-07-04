
let filterSelector = document.getElementById("order-filter");

filterSelector.addEventListener('change',function(){
    if(this.value !== 'sort'){
        let updateQueryStringParam = function (key, value) {
            let baseUrl = [location.protocol, '//', location.host, location.pathname].join(''),
                urlQueryString = document.location.search,
                newParam = key + '=' + value,
                params = '?' + newParam;
        
            // If the "status" string exists, then build params from it
            if (urlQueryString) {
                keyRegex = new RegExp('([\?&])' + key + '[^&]*');
        
                // If param exists already, update it
                if (urlQueryString.match(keyRegex) !== null) {
                    params = urlQueryString.replace(keyRegex, "$1" + newParam);
                } else { // Otherwise, add it to end of query string
                    params = urlQueryString + '&' + newParam;
                }
            }
            window.location.replace(baseUrl + params);
        };
        updateQueryStringParam('status',this.value)
    }
})