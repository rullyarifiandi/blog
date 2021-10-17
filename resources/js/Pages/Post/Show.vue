<template>
    <Head>
        <title>
            {{ post.title }}
        </title>
    </Head>
    <layouts>
        <template v-slot:header>
            <Navigation :title="`Back to posts`"/>
        </template>
        <template v-slot:default>
            <div class="flex flex-col w-full gap-2">
                <div class="text-3xl font-bold text-gray-800">{{ post.title }}</div>
                <div class="text-xs leading-loose tracking-wide text-gray-400">{{ post.user.name }} on {{ post.created_at }}</div>
                <Markdown :typographer="true" :breaks="true" :source="source" :plugins="plugins" class="min-w-full mt-3 text-base font-normal leading-loose tracking-wide prose text-justify text-gray-800 prose-purple"/>
                <div class="flex flex-row gap-2 mt-6 text-xs">
                    <div v-for="tag in post.tags" :key="tag.id">
                        <Link :href="route('posts.index', {tags:tag.name})" class="text-gray-500 hover:text-purple-600">{{ tag.name }}</Link>
                    </div>
                </div>
                <Comment class="pt-6 pb-2"/>
            </div>
        </template>
    </layouts>
</template>

<script>
    import Layouts from '../../Shared/Layouts.vue'
    import Navigation from '../../Components/Navigation.vue'
    import Comment from '../../Components/Comment.vue'
    import Markdown from 'vue3-markdown-it'
    import MarkdownItEmoji from 'markdown-it-emoji'
    import MarkdownItDeflist from 'markdown-it-deflist'
    import MarkdownItMark from 'markdown-it-mark'
    import MarkdownItSub from 'markdown-it-sub'
    import MarkdownItAnchor from 'markdown-it-anchor'
    import MarkdownItTocDoneRight from 'markdown-it-toc-done-right'

    export default {
        components:{
            Layouts, Navigation, Comment, Markdown
        },
        props: {
            post: Object,
        },
        data() {
            return {
                source: this.post.content,
                plugins: [
                    {
                        plugin: MarkdownItEmoji,
                        plugin: MarkdownItDeflist,
                        plugin: MarkdownItMark,
                        plugin: MarkdownItSub,
                        plugin: MarkdownItTocDoneRight,
                        plugin: MarkdownItAnchor,
                    }
                ]
            }
        }
    }
</script>

<style>
.hljs {
    overflow-x: auto;
    padding: 0.5em;
    color: #ddd;
}

.hljs-tag,
.hljs-keyword,
.hljs-selector-tag,
.hljs-literal,
.hljs-strong,
.hljs-name {
  color: #f92672;
}

.hljs-code {
  color: #66d9ef;
}

.hljs-class .hljs-title {
  color: white;
}

.hljs-attribute,
.hljs-symbol,
.hljs-regexp,
.hljs-link {
  color: #bf79db;
}

.hljs-string,
.hljs-bullet,
.hljs-subst,
.hljs-title,
.hljs-section,
.hljs-emphasis,
.hljs-type,
.hljs-built_in,
.hljs-builtin-name,
.hljs-selector-attr,
.hljs-selector-pseudo,
.hljs-addition,
.hljs-variable,
.hljs-template-tag,
.hljs-template-variable {
  color: #a6e22e;
}

.hljs-comment,
.hljs-quote,
.hljs-deletion,
.hljs-meta {
  color: #75715e;
}

.hljs-keyword,
.hljs-selector-tag,
.hljs-literal,
.hljs-doctag,
.hljs-title,
.hljs-section,
.hljs-type,
.hljs-selector-id {
  font-weight: bold;
}
</style>
