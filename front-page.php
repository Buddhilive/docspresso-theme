<?php
/**
 * The template for displaying the front page.
 *
 * @package DocsPresso_Tech_Blog
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section min-h-screen flex flex-col justify-center items-center text-center px-4 pt-32 pb-20 relative z-10">
    <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 drop-shadow-lg">
        Get started
    </h1>
    <p class="text-xl md:text-2xl text-white mb-8 max-w-2xl drop-shadow-md">
        Explore cutting-edge technology insights, AI innovations, and the latest in web development
    </p>
    <div class="flex flex-col sm:flex-row gap-4">
        <a href="#build" 
           class="px-8 py-4 bg-white text-purple-700 font-semibold rounded-lg shadow-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add Gemini
        </a>
        <a href="#research" 
           class="px-8 py-4 bg-transparent border border-white text-white font-semibold rounded-lg shadow-lg hover:bg-white hover:text-purple-700 transition-all duration-300 transform hover:scale-105 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            Search with AI Models
        </a>
        <a href="#content" 
           class="px-8 py-4 bg-transparent border border-white text-white font-semibold rounded-lg shadow-lg hover:bg-white hover:text-purple-700 transition-all duration-300 transform hover:scale-105 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            Create an image
        </a>
    </div>
    
    <!-- Additional action buttons row -->
    <div class="flex flex-col sm:flex-row gap-4 mt-4">
        <a href="#video" 
           class="px-8 py-4 bg-transparent border border-white text-white font-semibold rounded-lg shadow-lg hover:bg-white hover:text-purple-700 transition-all duration-300 transform hover:scale-105 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
            </svg>
            Generate video
        </a>
        <a href="#notebook" 
           class="px-8 py-4 bg-transparent border border-white text-white font-semibold rounded-lg shadow-lg hover:bg-white hover:text-purple-700 transition-all duration-300 transform hover:scale-105 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            Learn with NotebookLM
        </a>
    </div>
</section>

<!-- Build Section -->
<section id="build" class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex items-center justify-between mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Build</h2>
            <a href="#" class="text-purple-600 hover:text-purple-800 font-medium flex items-center">
                Explore our full AI stack
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-gray-50 p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Build with Google AI Studio</h3>
                <p class="text-gray-700 mb-4">Start building something new, with cutting-edge AI models and tools</p>
                <a href="#" class="text-purple-600 font-medium hover:text-purple-800 inline-flex items-center">
                    Try Google AI Studio
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
                <div class="mt-4">
                    <a href="#" class="text-purple-600 font-medium hover:text-purple-800 inline-flex items-center text-sm">
                        View Gemini API docs
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            
            <div class="bg-gray-50 p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Build with Vertex AI</h3>
                <p class="text-gray-700 mb-4">Explore 200+ models on our enterprise platform with tools and features for AI development</p>
                <a href="#" class="text-purple-600 font-medium hover:text-purple-800 inline-flex items-center">
                    Try Vertex AI
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Research Section -->
<section id="research" class="py-20 bg-black">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex items-center justify-between mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-white">Research</h2>
            <a href="#" class="text-white border border-gray-600 px-4 py-2 rounded-lg hover:bg-gray-800 transition-colors duration-300 font-medium">
                View all research
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php
            // Get latest posts for research section
            $research_posts = get_posts(array(
                'numberposts' => 4,
                'post_status' => 'publish',
                'category_name' => 'research' // You can create a research category
            ));
            
            if (empty($research_posts)) {
                $research_posts = get_posts(array(
                    'numberposts' => 4,
                    'post_status' => 'publish'
                ));
            }
            
            $research_items = array(
                array(
                    'title' => 'Quantum Echoes algorithm is a big step toward practical applications for quantum computing',
                    'date' => 'October 2025',
                    'source' => 'Google Research'
                ),
                array(
                    'title' => 'DeepSomatic: using AI to identify genetic variants in tumors',
                    'date' => 'October 2025',
                    'source' => 'Google Research'
                ),
                array(
                    'title' => 'Gemini Robotics 1.5: brings AI agents into the physical world',
                    'date' => 'September 2025',
                    'source' => 'Google DeepMind'
                ),
                array(
                    'title' => 'Genie 3: a general purpose world model that can generate a diversity of interactive environments',
                    'date' => 'August 2025',
                    'source' => 'Google DeepMind'
                )
            );
            
            foreach($research_items as $index => $item) :
            ?>
                <div class="bg-gray-900 p-6 rounded-xl hover:bg-gray-800 transition-colors duration-300">
                    <div class="flex items-start gap-4">
                        <div class="w-20 h-15 bg-gray-700 rounded-lg flex-shrink-0"></div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-white mb-2 line-clamp-2"><?php echo $item['title']; ?></h3>
                            <div class="flex items-center gap-4 text-sm text-gray-400">
                                <span><?php echo $item['date']; ?></span>
                                <span><?php echo $item['source']; ?></span>
                                <a href="#" class="text-white hover:underline">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Content/Features Section -->
<section id="content" class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Latest Insights</h2>
            <p class="text-xl text-gray-700 max-w-2xl mx-auto">Discover cutting-edge technology insights and innovation stories</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            $recent_posts = get_posts(array(
                'numberposts' => 3,
                'post_status' => 'publish'
            ));
            foreach($recent_posts as $post) : setup_postdata($post);
            ?>
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="aspect-video bg-gray-200">
                            <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover')); ?>
                        </div>
                    <?php endif; ?>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3"><?php the_title(); ?></h3>
                        <p class="text-gray-700 mb-4"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        <a href="<?php the_permalink(); ?>" class="text-purple-600 font-medium hover:text-purple-800 inline-flex items-center">
                            Read more
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            <?php 
            endforeach;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<?php
get_footer();