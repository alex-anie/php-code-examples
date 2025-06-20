function getCities(countryCode){
    let citiesDropDown = document.forms["my-form"].cities;

    if(countryCode.trim() === ""){
        citiesDropDown.disabled = true;
        citiesDropDown.selectedInbox = 0;

        return false;
    }

    fetch(`functions.php?country_code=${countryCode}`)
    .then(response => response.json())
    .then(function(cities){
        let out = "";
        for(let city of cities){
            out += `<option value="${city['city_name']}">${city['city_name']}</option>`
        }

        citiesDropDown.innerHTML = out;
        citiesDropDown.disabled = false;
    })
}