# Require any additional compass plugins here.

# Tell compass where to find local extensions
# If you followed directions and ran 'gem install modular-scale' comment the next two lines out:
extensions_dir = "frameworks"
Compass::Frameworks.register('modular-scale', :path => File.expand_path("#{extensions_dir}/modular-scale"))

# Set this to the root of your project when deployed:
http_path = "/"
css_dir = "css"
sass_dir = "sass"
images_dir = "images"
javascripts_dir = "javascripts"
fonts_dir = "fonts"

# Change this to :production when ready to deploy the CSS to the live server.
environment = :development
#environment = :production

output_style = (environment == :development) ? :expanded : :compressed
sass_options = (environment == :development) ? {:sourcemap => true} : {}

# To enable relative paths to assets via compass helper functions. Uncomment:
relative_assets = true

color_output = false


# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass sass scss && rm -rf sass && mv scss sass
