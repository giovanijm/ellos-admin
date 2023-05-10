const HSThemeAppearance = {
    init() {
        const defaultTheme = 'default'
        let theme = localStorage.getItem('hs_theme') || defaultTheme

        if (document.querySelector('html').classList.contains('dark')) return
        this.setAppearance(theme)
    },
    _resetStylesOnLoad() {
        const $resetStyles = document.createElement('style')
        $resetStyles.innerText = `*{transition: unset !important;}`
        $resetStyles.setAttribute('data-hs-appearance-onload-styles', '')
        document.head.appendChild($resetStyles)
        return $resetStyles
    },
    setAppearance(theme, saveInStore = true, dispatchEvent = true) {
        const $resetStylesEl = this._resetStylesOnLoad()

        if (saveInStore) {
            localStorage.setItem('hs_theme', theme)
        }

        if (theme === 'auto') {
            theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'default'
        }

        document.querySelector('html').classList.remove('dark')
        document.querySelector('html').classList.remove('default')
        document.querySelector('html').classList.remove('auto')

        document.querySelector('html').classList.add(this.getOriginalAppearance())

        setTimeout(() => {
            $resetStylesEl.remove()
        })

        if (dispatchEvent) {
            window.dispatchEvent(new CustomEvent('on-hs-appearance-change', {detail: theme}))
        }
    },
    getAppearance() {
        let theme = this.getOriginalAppearance()
        if (theme === 'auto') {
            theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'default'
        }
        return theme
    },
    getOriginalAppearance() {
        const defaultTheme = 'default'
        return localStorage.getItem('hs_theme') || defaultTheme
    }
}
HSThemeAppearance.init()

window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
    if (HSThemeAppearance.getOriginalAppearance() === 'auto') {
        HSThemeAppearance.setAppearance('auto', false)
    }
})

window.addEventListener('load', () => {
    const $clickableThemes = document.querySelectorAll('[data-hs-theme-click-value]')
    const $switchableThemes = document.querySelectorAll('[data-hs-theme-switch]')

    $clickableThemes.forEach($item => {
        $item.addEventListener('click', () => HSThemeAppearance.setAppearance($item.getAttribute('data-hs-theme-click-value'), true, $item))
    })

    $switchableThemes.forEach($item => {
        $item.addEventListener('change', (e) => {
            HSThemeAppearance.setAppearance(e.target.checked ? 'dark' : 'default')
        })

        $item.checked = HSThemeAppearance.getAppearance() === 'dark'
    })

    window.addEventListener('on-hs-appearance-change', e => {
        $switchableThemes.forEach($item => {
            $item.checked = e.detail === 'dark'
        })
    })
})

window.addEventListener('load', () => {
    function setThemeForIframes (evt) {
        document.querySelectorAll('[data-hs-component-dark-mode]')
            .forEach($toggleEl => {
                const $targetEl = document.querySelector($toggleEl.getAttribute('data-hs-component-dark-mode'))

                if (!$targetEl) return

                const svgEls = $toggleEl.querySelectorAll('[data-svg]')

                if (evt.detail === 'dark') {
                    $targetEl.classList.add('dark')
                    svgEls[0].classList.remove('hidden')
                    svgEls[1].classList.add('hidden')
                    $toggleEl.classList.add('opacity-50')
                } else {
                    $targetEl.classList.remove('dark')
                    svgEls[0].classList.add('hidden')
                    svgEls[1].classList.remove('hidden')
                    $toggleEl.classList.remove('opacity-50')
                }

                if ($targetEl.querySelector('iframe')) {
                    const iDocumnet = $targetEl.querySelector('iframe').contentWindow.document
                    if (evt.detail === 'dark') {
                        iDocumnet.documentElement.classList.add('dark')
                    } else {
                        iDocumnet.documentElement.classList.remove('dark')
                    }
                }
            })
    }

    setThemeForIframes({detail: HSThemeAppearance.getAppearance()})

    document.addEventListener('click', evt => {
        const $toggleEl = evt.target.closest('[data-hs-component-dark-mode]')

        if (!$toggleEl) return

        const $targetEl = document.querySelector($toggleEl.getAttribute('data-hs-component-dark-mode'))

        if (!$targetEl || HSThemeAppearance.getAppearance() === 'dark') return

        const svgEls = $toggleEl.querySelectorAll('[data-svg]')
        svgEls.forEach($svgEl => $svgEl.classList.toggle('hidden'))

        $targetEl.classList.toggle('dark')

        if ($targetEl.querySelector('iframe')) {
            const iDocumnet = $targetEl.querySelector('iframe').contentWindow.document
            iDocumnet.documentElement.classList.toggle('dark')
        }
    })

    window.addEventListener('on-hs-appearance-change', evt => setThemeForIframes(evt))
})
