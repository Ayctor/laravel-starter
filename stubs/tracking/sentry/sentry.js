import * as Sentry from "@sentry/browser";
import { Integrations } from '@sentry/tracing';
import { CaptureConsole } from '@sentry/integrations';

if (window.sentry.environment !== 'local' && window.sentry.dsn) {
    Sentry.init({
        dsn: window.sentry.dsn,
        environment: window.sentry.environment,
        release: window.sentry.release,
        integrations: [
            new Integrations.BrowserTracing(),
            new CaptureConsole({ levels: ['error'] }),
        ],
        tracesSampleRate: 1.0,
    });
}
