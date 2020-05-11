<template>
    <div class="col-md-5" id="labMap">
        <!-- default Prepr address (Canada) -->
        <gmap-map
            ref="map"
            :center="{lat: 43.441183, lng: -79.694023}"
            :zoom="12"
            style="width:100%;  height: 450px;"
        >
        </gmap-map>
    </div>
</template>
<script>
    export default {
        name: "LabMap",
        props: ['location', 'markers'],
        async mounted() {
            //Referenced from the https://github.com/xkjyeah/vue-google-maps for the promise method
            this.$refs.map.$mapPromise.then((map) => {
                //Depending if there is a collection of markers or 1 location
                //location is for the show lab view
                //markers is for the map view (list of all the labs as marker in the map)
                
                var geocoder = new google.maps.Geocoder();
                //Go to the location of the lab (move to view)
                geocoder.geocode({'address': this.location}, (results, status) => {
                    if (status === 'OK')
                    {
                        map.panTo({
                            lat: results[0].geometry.location.lat(),
                            lng: results[0].geometry.location.lng()
                        });
                        //Add a marker
                        let maker = new window.google.maps.Marker({
                            position: {
                                lat: results[0].geometry.location.lat(),
                                lng: results[0].geometry.location.lng()
                            },
                            map: map
                        });
                    }
                });
            });
        }
    }
</script>

<style scoped>

</style>
