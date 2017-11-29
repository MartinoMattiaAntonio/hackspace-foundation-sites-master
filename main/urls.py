from django.conf.urls import url

from . import views

app_name = 'main'
urlpatterns = [
    url(r'^$', views.index, name='index'),
    url(r'^storage/([0-9]+)$', views.project, name='project'),
    url(r'^storage/edit.php$', views.new_project, name='new_project'),
    url(r'^members/profile/([0-9]+)$', views.profile, name='profile'),
    url(r'^reports/report$', views.report, name='report'),
    url(r'^(.*)$', views.fallback, name='fallback'),
]

