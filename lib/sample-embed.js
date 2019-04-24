{
  name: 'core-embed/spotify',
  settings: {
    title: 'Spotify',
    icon: _icons.embedSpotifyIcon,
    keywords: [(0, _i18n.__)('music'), (0, _i18n.__)('audio')],
    description: (0, _i18n.__)('Embed Spotify content.')
  },
  patterns: [/^https?:\/\/(open|play)\.spotify\.com\/.+/i]
},