<template>
  <div>
    <div class="flex flex-wrap">
      <button class="bot-wysiwig-button" @click="applyBold">
        <i class="fa fas fa-bold" />
      </button>
      <button class="bot-wysiwig-button" @click="applyItalic">
        <i class="fa fas fa-italic" />
      </button>
      <button class="bot-wysiwig-button" @click="applyHeading">
        <i class="fa fas fa-heading" />
      </button>
      <button class="bot-wysiwig-button" @click="applyUl">
        <i class="fa fas fa-list-ul" />
      </button>
      <button class="bot-wysiwig-button" @click="applyOl">
        <i class="fa fas fa-list-ol" />
      </button>
      <button class="bot-wysiwig-button" @click="undo">
        <i class="fa fas fa-undo" />
      </button>
      <button class="bot-wysiwig-button" @click="redo">
        <i class="fa fas fa-redo" />
      </button>
    </div>

    <div
      @input="onInput"
      v-html="innerValue"
      contenteditable="true"
      class="bot-wysiwyg-output outline-none border-2 p-4 rounded-lg border-gray-300 focus:border-green-300"
    />
  </div>
</template>

<script>
import { Marked } from '@ts-stack/markdown'
import TurndownService from 'turndown'

export default {
  name: 'WysiwygEditor',

  props: {
    value: "",
  },

  data() {
    return {
      innerValue: Marked.parse(this.value) || '<p><br></p>'
    }
  },

  mounted() {
    document.execCommand('defaultParagraphSeparator', false, 'p')
  },

  methods: {
    onInput(event) {
      const turndown = new TurndownService({
        emDelimiter: '_',
        linkStyle: 'inlined',
        headingStyle: 'atx'
      })
      this.$emit('input', turndown.turndown(event.target.innerHTML))
    },
    applyBold() {
      document.execCommand('bold')
    },
    applyItalic() {
      document.execCommand('italic')
    },
    applyHeading() {
      document.execCommand('formatBlock', false, '<h1>')
    },
    applyUl() {
      document.execCommand('insertUnorderedList')
    },
    applyOl() {
      document.execCommand('insertOrderedList')
    },
    undo() {
      document.execCommand('undo')
    },
    redo() {
      document.execCommand('redo')
    }
  }
}
</script>