from django import template
from django.core import urlresolvers
from django.utils.html import format_html

register = template.Library()

@register.simple_tag(takes_context=True)
def menulink(context, name, title, viewname, *args, **kwargs):
    if context['page'] == name:
        return format_html('<li class="active">{}</li>', title)
    else:
        path = urlresolvers.reverse(viewname, args=args, kwargs=kwargs)
        return format_html('<li><a href="{}">{}</a></li>', path, title)


