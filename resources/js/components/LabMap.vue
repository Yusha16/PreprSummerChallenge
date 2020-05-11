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
        props: {
            location: {
                type: String
            },
            markers: {
                type: Array,
                default: []
            }
        },
        async mounted() {
            //Referenced from the https://github.com/xkjyeah/vue-google-maps for the promise method
            this.$refs.map.$mapPromise.then((map) => {
                //Depending if there is a collection of markers or 1 location
                //location is for the show lab view
                //markers is for the map view (list of all the labs as marker in the map)

                if (this.markers.length == 0) {
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
                }
                else {
                    //Make the map fit the body
                    document.getElementById('labMap').setAttribute("class", "col-md-12");
                    //Add all the markers for the lab
                    for(let i = 0; i < this.markers.length; i++)
                    {
                        var geocoder = new google.maps.Geocoder();
                        //Go to the location of the lab (move to view)
                        geocoder.geocode({'address': this.markers[i]}, (results, status) => {
                            if (status === 'OK')
                            {
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
                    }
                }
            });
        }
    }
</script>

<style scoped>

</style>
