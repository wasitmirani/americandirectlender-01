<template>
  <div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-6 col-md-4 box-col-4 des-xl-50">
          <div class="card profile-greeting">
            <div class="card-header">
              <div class="header-top"></div>
            </div>
            <div class="card-body text-center p-t-0">
              <h3 class="font-light">Wellcome Back, {{ user.name }}!!</h3>
              <p>
             Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi minima veritatis nam iste soluta dolorum voluptate vero quam at cum blanditiis, repellendus cumque obcaecati, eligendi fuga facilis ex nulla eveniet.
              </p>
            </div>

            <div class="confetti">
              <div class="confetti-piece"></div>
              <div class="confetti-piece"></div>
              <div class="confetti-piece"></div>
              <div class="confetti-piece"></div>
              <div class="confetti-piece"></div>
              <div class="confetti-piece"></div>
              <div class="confetti-piece"></div>
              <div class="confetti-piece"></div>
              <div class="confetti-piece"></div>
              <div class="confetti-piece"></div>
              <div class="confetti-piece"></div>
              <div class="confetti-piece"></div>
              <div class="confetti-piece"></div>
            </div>

          </div>

          <div class="box-col-12 col-xl-12 des-xl-100">
                <div class="card">
                  <div class="card-header pb-0">
                    <h5> </h5>
                  </div>
                  <div class="card-body apex-chart">
                    <div id="piechart"></div>
                      <div id="chart">
                   <!-- <lineChart :app_status="app_status" ></lineChart> -->
                </div>
                  </div>

                </div>

                <!-- <div class="card" v-if="role == 'Admin'">
                    <div class="card-header pb-0">
                      <h5>Prmissions Analytics</h5>
                    </div>
                    <div class="card-body">
                      <div id="circlechart">
                      </div>
                    </div>
                </div> -->
          </div>
        </div>
        <div class="col-xl-6 box-col-12 des-xl-100 invoice-sec">
                <div class="card">
                  <div class="card-header pb-0">
                    <h5></h5>
                  </div>
                  <div class="card-body">
                    <div id="basic-apex"></div>
                    <div id="chart">
                        <!--<BarGraph :total_apps="total_apps" :dates="dates"></BarGraph>-->
                    </div>
                  </div>
                </div>
                <!-- <div class="card" v-if="role == 'Admin'">
                    <div class="card-header pb-0">
                       <h5>Users By Role</h5>
                    </div>
                    <div class="card-body p-0 chart-block">
                      <div class="chart-overflow" id="pie-chart3"></div>
                    </div>
                    <div id="chart">
                    </div>
                </div> -->
        </div>
      </div>
      <div class="row" v-if="role == 'Admin'">
          <Role :total_users="total_users" :roles="roles"></Role>
      </div>
      <div>
        <div class="col-xl-12 xl-50 box-col-12">
          <div class="widget-joins card widget-arrow">
            <div class="row">
       <AppStatistics :total_applications="total_applications" :assigned_apps="assigned_apps"></AppStatistics>
              <!-- <div class="col-sm-6 ps-0">
                <div class="media" v-if="role == 'ademin'">
                  <div class="align-self-center me-3 text-start">
                    <span class="widget-t mb-1">

                    </span>
                    <h5 class="mb-0">Agents</h5>
                  </div>
                  <!-- <div class="media-body align-self-center ps-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up font-primary"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg></div> -->
                  <!-- <div class="media-body ps-2">
                    <h5 class="mb-0"><span class="counter" v-for="role in roles" :key="role.id">{{role.users_count}}</span></h5>
                    <span class="mb-1"></span>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <Agent></Agent>
    </div>

    <div class="row">
      <div class="card">
        <div class="card-body">
            <RecentApp :apps="apps"></RecentApp>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import lineChart from './ChartComponent.vue'
import donutChart from './DonutChart.vue'
import BarGraph from './BarGraph.vue'
import Agent from './AgentComponent.vue'
import AppStatistics from './AppStatistics.vue'
import RecentApp from './RecentApplication.vue'
import Role from './RoleComponent.vue'

export default {
    components:{
       lineChart,
       donutChart,
       BarGraph,
       Agent,
       AppStatistics,
       RecentApp,
       Role
    },

  data() {
    return {
      series: [],
      chartOptions: {
            chart: {
              height: 390,
              type: 'radialBar',
            },
            plotOptions: {
              radialBar: {
                offsetY: 0,
                startAngle: 0,
                endAngle: 270,
                hollow: {
                  margin: 5,
                  size: '30%',
                  background: 'transparent',
                  image: undefined,
                },
                dataLabels: {
                  name: {
                    show: true,
                  },
                  value: {
                    show: true,
                  }
                }
              }
            },
            colors: ['#1ab7ea', '#0084ff', '#39539E', '#0077B5'],
            labels: ['admin'],
            legend: {
              show: true,
              floating: true,
              fontSize: '16px',
              position: 'left',
              offsetX: 160,
              offsetY: 15,
              labels: {
                useSeriesColors: true,
              },
              markers: {
                size: 0
              },
              formatter: function(seriesName, opts) {
                return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
              },
              itemMargin: {
                vertical: 3
              }
            },
            responsive: [{
              breakpoint: 480,
              options: {
                legend: {
                    show: true
                }
              }
            }]
          },
      logs: [],
      user: {},
      app_name: "",
      total_users: 0,
      total_applications: 0,
      total_roles: 0,
      assigned_apps: 0,
      roles: {},
      role:"",
      apps: {},
      labels:[],
      chartOptions:{},
      userByRole:"",
      userWithRole:"",
      app_status:[],
      total_apps : [],
      userRoleLabel : [],
      userByPermission:[],
      userPermissionLabel:[],
      totalPermissions:0,
      dates:[]

    }

  },

  methods: {
      pieChart(){
          var options8 = {
    chart: {
        width: 380,
        type: 'pie',
    },
    labels: ['Pending Apps', 'Approved Apps'],
    series: this.app_status,
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200
            },
            legend: {
                position: 'bottom'
            }
        }
    }],
    colors: ['#46c93a', '#ffba00']
}

var chart8 = new ApexCharts(
    document.querySelector("#piechart"),
    options8
);
chart8.render();
},
radialBar(){
    var options11 = {
        chart: {
        height: 350,
        type: 'radialBar',
        },
        plotOptions: {
        radialBar: {
            dataLabels: {
                name: {
                    fontSize: '22px',
                },
                value: {
                    fontSize: '16px',
                },
                total: {

                    show: true,
                    label: 'Permissions',
                    formatter: function(w) {
                        return 5;
                    }
                }
            }
        }
        },
    series: this.userByPermission,
    labels: this.userPermissionLabel,
    colors: [vihoAdminConfig.primary, vihoAdminConfig.secondary, '#222222', '#717171']
}
    var chart11 = new ApexCharts(
    document.querySelector("#circlechart"),
    options11
);
    chart11.render();
},
dashboardChart() {

    var options = {
    chart: {
        height: 350,
        type: 'area',
        zoom: {
            enabled: false
        },
        toolbar:{
          show: false
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'straight'
    },

    series: [{
        name: "Applications",
        data:this.total_apps,
        // data:this.applications,
    }],
    title: {
        text: 'Applications Analytics',
        align: 'left'
    },
    subtitle: {
        text: '',
        align: 'left'
    },
    // labels:  this.total,
     labels:  this.dates,
    xaxis: {
        type: 'datetime',
    },
    yaxis: {
        opposite: true
    },
    legend: {
        horizontalAlign: 'left'
    },
    colors:[vihoAdminConfig.primary]

}

    var chart = new ApexCharts(
    document.querySelector("#basic-apex"),
    options
);
chart.render();
},
// donutChart(){
//       var data = google.visualization.arrayToDataTable([

//         ['Role', 'Users'],
//         ['Admin', 2],
//         this.userByRole.forEach(function (arrayItem) {
//                     var x = arrayItem.name;
//                     var y = arrayItem.users_count;
//                     "['"+x+"',"+" "+y+"],"
//         })
//         ['Agent', 3]
//       ]);
//       var options = {
//         title: 'Users By Role',
//         pieHole: 0.4,
//         width:'100%',
//         height: 300,
//         colors: [vihoAdminConfig.secondary, vihoAdminConfig.primary]
//       };
//       var chart = new google.visualization.PieChart(document.getElementById('pie-chart3'));
//       chart.draw(data, options);
// },
async getDashboardData() {
      await axios.get("dashboard").then((res) => {
        //  console.log(res.data)
        this.total_users = res.data.users;
        this.total_applications = res.data.total_application;
        this.roles = res.data.roles;
        this.total_roles = res.data.total_roles;
        this.assigned_apps = res.data.assigned_apps;
        this.applications = res.data.total;
        let data=res.data.dateby_applications;
        this.role = res.data.role;
        // console.log(data);
        this.dates=[];
        this.total_apps=[];
        this.dates = data.map(x =>  moment(x.created_at).format("D MMM YYYY"));
        this.total_apps = data.map(x => parseInt(x.total));
        this.app_status = res.data.app_status.map(x => x.count)
        this.chartOptions.labels = res.data.userByRole.map(x => x.name)
        this.series =  res.data.userByRole.map(x => x.users_count)
        this.chartOptions.labels = res.data.userByRole.map(x => x.name)
        this.userByPermission = res.data.userByPermission.map(x => x.users_count)
        this.userPermissionLabel = res.data.userByPermission.map(x => x.name)
        this.totalPermissions = res.data.totalPermissions;
        // this.dates = res.data.dates;
        // series.applications =  data.map(x => x.created_at);
        // series.total = data.map(x => x.total);
        // var arr =  res.data.userByRole.map(x => x)
        // console.log(arr)
        // this.userByRole = arr.reduce(
        //   (obj, item) => Object.assign(obj, { [item.name]: item.users_count }), {}
        // );
        // this.userByRole.forEach(function (arrayItem) {
        //             var x = arrayItem.name;
        //             var y = arrayItem.users_count;
        //             "['"+x+"',"+" "+y+"],"
        //         })
        this.dashboardChart();
        this.pieChart();
        this.radialBar();
        // this.donutChart();
        // this.userRoleChart();
      });
    },

  },

  mounted() {
    this.getDashboardData();
    // console.log("userss",user);
    this.user = user;
    this.app_name = "American Lender";
    axios
      .get("/recent/applications/")
      .then((res) => {
        this.apps = res.data.applications;
        //    console.log(res.data.applications)
        this.loading = false;
      })
      .catch((err) => {
        this.$root.alertNotificationMessage(
          err.response.status,
          err.response.data
        );
      });
  },
};
</script>

<style lang="scss" scoped>

</style>
